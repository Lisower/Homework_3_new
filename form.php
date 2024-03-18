<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script defer src="script.js"></script>
        <title>ФОРМА</title>
    </head>
    <body>

        <button id="Button">Открыть форму</button>

        <div id="Popup" class="Popup">
            <form id="Form">
                <h1>Форма</h1>

                <label>
                    ФИО<br>
                    <input name="field-name-1"
                    placeholder="Введите Ваше ФИО"
                    required>
                </label><br>

                <label>
                Номер телефона<br>
                <input name="field-tel"
                    type="tel"
                    placeholder="Введите Ваш номер телефона"
                    required>
                </label><br>

                <label>
                Почта e-mail<br>
                <input name="field-email"
                    type="email"
                    placeholder="Введите Вашу почту"
                    required>
                </label><br>

                <label>
                    Дата рождения<br>
                    <input name="field-date"
                    type="date"
                    required>
                </label><br>
                
                Пол<br>
                <label><input type="radio"
                name="radio-group-1" value="Значение1" checked="checked">
                М</label>
                <label><input type="radio"
                name="radio-group-1" value="Значение2">
                Ж</label><br>

                <label>
                    Любимый язык программирования<br>
                    <select name="fovourite_languages[]" required
                        multiple="multiple">
                        <option value="Pascal">Pascal</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="PHP">PHP</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="Haskel">Haskel</option>
                        <option value="Clojure">Clojure</option>
                        <option value="Prolog">Prolog</option>
                        <option value="Scala">Scala</option>
                    </select>
                </label><br>

                <label>
                    Биография<br>
                    <textarea name="field-name-3" placeholder="Напишите Вашу биографию"></textarea>
                </label><br>

                <label><input type="checkbox"
                    name="check-1" required>
                    С контрактом ознакомлен
                </label><br>

                <input type="submit" value="Сохранить">
            </form>
        </div>
    </body>
</html>
