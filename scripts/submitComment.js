const submitCommentForm = document.querySelector('.js-submit-comment');
const inputValue = submitCommentForm.querySelector('input[name=comment]');

const submitComment = (comment) => {
  $.ajax({
    url: "submit_comment.php",
    type: "GET",
    data: {
      "comment": comment
    },
    dataType: "text",
    success: function (response) {
      console.log(response);
    },
  });
}

submitCommentForm.addEventListener('submit', (e) => {
  e.preventDefault();
  submitComment(inputValue.value);
});
