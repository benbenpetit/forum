const submitPostForm = document.querySelector('.js-submit-post');
const titleValue = submitPostForm.querySelector('input[name=title-post]');
const textValue = submitPostForm.querySelector('input[name=message-post]')

const submitPost = (title, text) => {
  $.ajax({
    url: "../Manager/SubmitPost.php",
    type: "GET",
    data: {
      "title": title,
      "text": text,
      "create-post": true
    },
    dataType: "text",
    success: function (response) {
      location.reload();
    },
  });
}

submitPostForm.addEventListener('submit', (e) => {
  e.preventDefault();
  submitPost(titleValue.value, textValue.value);
});
