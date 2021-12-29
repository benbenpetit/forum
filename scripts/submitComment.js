const submitCommentForm = document.querySelector('.js-submit-comment');
const inputValue = submitCommentForm.querySelector('input[name=comment]');

const submitComment = (comment) => {
  $.ajax({
    url: "connexion.php",
    type: "GET",
    data: {
      "comment": comment
    }
    dataType: "json",
    success: function (reponse) {
      console.log('oui ok');
    },
  });
}

$("#connexion").click(function () {
  var mdp = document.getElementById("mdp").value;
  connexion(mdp);
});

submitCommentForm.addEventListener('submit', (e) => {
  e.preventDefault();
  submitComment(inputValue.value);
});
