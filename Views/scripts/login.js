const loginForm = document.querySelector('.js-login-form');
const emailValue = loginForm.querySelector('input[name=email]');
const passwordValue = loginForm.querySelector('input[name=password]');

const tryLogin = (email, password) => {
  $.ajax({
    url: "../Manager/LoginManager.php",
    type: "POST",
    data: {
      "try_login": true,
      "email": email,
      "password": password
    },
    dataType: "text",
    success: function (response) {
      if (response === 'not logged in') {
        loginForm.style.backgroundColor = 'rgba(226, 195, 195, 0.911)';
      } else {
        location.reload();
      }
    },
  });
}

loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  tryLogin(emailValue.value, passwordValue.value);
});
