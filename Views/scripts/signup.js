const signupForm = document.querySelector('.js-signup-form');
const emailValue = signupForm.querySelector('input[name=email]');
const passwordValue = signupForm.querySelector('input[name=password]');
const firstnameValue = signupForm.querySelector('input[name=firstname]');
const lastnameValue = signupForm.querySelector('input[name=lastname]');
const ageValue = signupForm.querySelector('input[name=age]');
const pseudoValue = signupForm.querySelector('input[name=pseudo]');

const trySignup = () => {
  $.ajax({
    url: "../Manager/SignupManager.php",
    type: "POST",
    data: {
      "try-signup": true,
      "email": emailValue.value,
      "password": passwordValue.value,
      "firstname": firstnameValue.value,
      "lastname": lastnameValue.value,
      "age": ageValue.value,
      "pseudo": pseudoValue.value
    },
    dataType: "text",
    success: function (response) {
      if (response === 'not created') {
        signupForm.style.backgroundColor = 'rgba(226, 195, 195, 0.911)';
      } else {
        window.location.href += "?signedup";
      }
    },
  });
}

signupForm.addEventListener('submit', (e) => {
  e.preventDefault();
  trySignup();
});
