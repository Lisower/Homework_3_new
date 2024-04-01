<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    print('Спасибо, результаты сохранены.');
  }
  include('form.php');
  exit();
}

$errors = FALSE;

if (empty($_POST['FIO'])) {
  print('Введите ФИО!');
  $errors = TRUE;
}

if (!preg_match('/^[a-zA-Zа-яА-Я]+$/', $_POST['FIO'])) {
  print('ФИО введено некорректно!');
  $errors = TRUE;
}

if (empty($_POST['phone_number'])) {
  print('Введите номер телефона!');
  $errors = TRUE;
}

if (!is_numeric($_POST['phone_number']) || !preg_match('/^\d+$/', $_POST['phone_number'])) {
  print('Номер телефона введён некорректно!');
  $errors = TRUE;
}

if (empty($_POST['e_mail'])) {
  alert('Введите почту!');
  $errors = TRUE;
}

if (empty($_POST['favourite_languages'])) {
  print('Выберите хотя бы один любимый язык программирования!');
  $errors = TRUE;
}

if (empty($_POST['sex'])) {
  print('Выберете пол!');
  $errors = TRUE;
}

if (preg_match('/^[МЖ]+$/', $_POST['phone_number'])) {
  print('Некорректный пол!');
  $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u67447';
$pass = '5579779';
$db = new PDO('mysql:host=localhost;dbname=u67447', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

try {
  $stmt = $db->prepare(
    "INSERT INTO Applications SET FIO = ?, phone_number = ?, e_mail = ?, birthday = ?, sex = ?, biography = ?");
  $stmt->execute([$_POST['FIO'],$_POST['phone_number'],$_POST['e_mail'],$_POST['birthday'],$_POST['sex'],$_POST['biography']]);
  $application_id = $db->lastInsertId();
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
