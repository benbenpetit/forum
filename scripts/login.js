const loginForm = document.querySelector('.js-login-form');
const emailValue = loginForm.querySelector('input[name=email]');
const passwordValue = loginForm.querySelector('input[name=password]');

const tryLogin = (email, password) => {
  $.ajax({
    url: "LoginManager.php",
    type: "POST",
    data: {
      "try_login": true,
      "email": email,
      "password": password
    },
    dataType: "text",
    success: function (response) {
      if (response === 'not found') {
        console.log('not found');
      } else {
        console.log('user found : ' + response);
        location.reload();
      }
    },
  });
}

loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  tryLogin(emailValue.value, passwordValue.value);
});
