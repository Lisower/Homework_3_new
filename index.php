<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}

/*
// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['fio'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}

if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
  print('Заполните год.<br/>');
  $errors = TRUE;
}


// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}
*/
// Сохранение в базу данных.

$user = 'u67447';
$pass = '5579779';
$db = new PDO('mysql:host=localhost;dbname=u67447', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); // Заменить test на имя БД, совпадает с логином uXXXXX

try {
  $stmt = $db->prepare(
    "INSERT INTO Applications SET FIO = ?, phone_number = ?, e_mail = ?, birthday = ?, sex = ?, biography = ?");
  $stmt->execute([$_POST['FIO'],$_POST['phone_number'],$_POST['e_mail'],$_POST['birthday'],$_POST['sex'],$_POST['biography']]);
  $application_id = $db->lastInsertId();
  print($_POST['favourite_languages']);
  $stmt = $db->prepare("INSERT INTO Application_languages (application_id, language_id) VALUES (?, ?)");
  foreach ($_POST['favourite_languages'] as $language_id) {
      $stmt->execute([$application_id, $language_id]); 
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');
