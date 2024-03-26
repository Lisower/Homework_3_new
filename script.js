const Button = document.getElementById('Button');
const Popup = document.getElementById('Popup');
const Form = document.getElementById('Form');

Button.addEventListener('click', () => {
    Popup.style.display = 'block';
});

window.addEventListener('popstate', () => {
    Popup.style.display = 'none';
});
 /*
Form.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData(Form);
    const httpRequest = new XMLHttpRequest();
    httpRequest.open('POST', '', true);
    httpRequest.onreadystatechange = () => {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            alert("Данные формы успешно отправлены!");
            Form.reset();
            localStorage.removeItem('FormData');
            Popup.style.display = 'none';
        } else {
            alert("Что-то пошло не так! Данные не отправлены!");
        }
        }
    };
    httpRequest.send(formData);
});
*/
Form.addEventListener('change', () => {
    const formData = new FormData(Form);
    const data = Object.fromEntries(formData.entries());
localStorage.setItem('FormData', JSON.stringify(data));
});

window.addEventListener('load', () => {
    const savedFormData = JSON.parse(localStorage.getItem('FormData'));

    if (savedFormData) {
        document.getElementById('FIO').value = savedFormData.FIO;
        document.getElementById('e_mail').value = savedFormData.e_mail;
        document.getElementById('phone_number').value = savedFormData.phone_number;
        document.getElementById('birthday').value = savedFormData.birthday;
        document.getElementById('sex').value = savedFormData.sex;
        document.getElementById('favourite_languages').checked = savedFormData.favourite_languages;
        document.getElementById('biography').checked = savedFormData.biography;
        document.getElementById('check').checked = savedFormData.check;
    }
});
