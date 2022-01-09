const submitCommentForm = document.querySelector('.js-submit-comment');
const messageValue = submitCommentForm.querySelector('textarea[name=message]');
const postIdValue = submitCommentForm.querySelector('input[name=_post_id]')

const submitComment = (message, postId) => {
  $.ajax({
    url: "../Manager/SubmitComment.php",
    type: "GET",
    data: {
      "_post_id": postId,
      "message": message
    },
    dataType: "text",
    success: function (response) {
      location.reload();
    },
  });
}

submitCommentForm.addEventListener('submit', (e) => {
  e.preventDefault();
  submitComment(messageValue.value, postIdValue.value);
});
