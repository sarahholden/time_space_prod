/* ---------------------------------------------
Form Submission Data
------------------------------------------------ */
function getFormData () {
  var formData = {};

  formData.full_name = $('#full_name').val();
  formData.email = $('#email').val();
  formData.message = $('#message').val();
  formData.to_email = $('#contact_form').data('to-email');

  return formData;
}


/* ---------------------------------------------
Form Submissions
------------------------------------------------ */
var invalid = 0;

function checkField (field) {
  var userInput = field.val();
  field.siblings('p').remove();
  if (field.prop('required') && userInput === '') {
    field.after('<p class="error">Please fill in the field before continuing.</p>');
    field.closest('.validation-wrapper').addClass('has-error');
    invalid++;
    return false;
  } else if (field.attr('type') === 'email' && !(/(.+)@(.+){2,}\.(.+){2,}/.test(userInput))) {
    field.after('<p class="error">Please enter a valid email address.</p>');
    invalid++;
    return false;
  } else {
    field.closest('.validation-wrapper').removeClass('has-error');
  }
  return true;
}

function checkAllFields() {
  invalid = 0;
  $('.error').remove();
  $('#contact_form input, #contact_form textarea').each(function () {
    checkField($(this));
  });

  if (invalid > 0) {
    return false;
  }

  return true;
}

$('#contact_form input, #contact_form textarea').on('blur', function () {
  checkField($(this));
});

/* ---------------------------------------------
Form Submit
------------------------------------------------ */
$('#contact_form').on('submit', function (e) {
  e.preventDefault();

  var postFilePath = $(this).attr('action');
  console.log(postFilePath);

  // First check to make sure all required fields are filled out
  if (checkAllFields()){

    // Get form data
    var formData = getFormData();

    $('.error').fadeOut();

    // Pass to PHP file, where the contact email will be sent and the response saved in the DB
    $.post(postFilePath, formData, function(data) {
      console.log(data);
      // Display thank you modal window
      $('.thanks').css("display", "flex")
        .hide()
        .fadeIn();
    });
  }
});
