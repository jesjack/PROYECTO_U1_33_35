document.body.onload = evt => {

  $('form.toValidate').submit(evt => {
    evt.preventDefault();
    if($('.is-invalid').length > 0) alert('Checate el input que esta mal.')
    if($('input').length == $('.is-valid').length) alert('Todo bien, joven')
  });
  
  const inputs = {
    text: $('input.normal-text'),
    mail: $('input[type="email"]'),
    user: $('#user-input'),
    pass: $('input[type="password"]'),
    tell: $('input[type="tel"]')
  };

  $('input').on('keyup', evt => {
    valText(); valMail(); valUser(); valPass(); valTell();
  }); $('input').blur(evt => {
    valText(); valMail(); valUser(); valPass(); valTell();
  }); $('input').focus(evt => {
    valText(); valMail(); valUser(); valPass(); valTell();
  });

  function valText() {
    inputs.text.toArray().forEach(input => {
      var valie = true;
      input.value.split('').forEach(l => {
        if((l.toLowerCase() < 'a' || l.toLowerCase() > 'z')
          && l.toLowerCase() != ' '
          && l.toLowerCase() != 'á'
          && l.toLowerCase() != 'é'
          && l.toLowerCase() != 'í'
          && l.toLowerCase() != 'ó'
          && l.toLowerCase() != 'ú'
          && l.toLowerCase() != 'ñ'
        ) {
          setInvalid($(input));
          valie = false;
        }
      });
      if(valie) {
        setValid($(input));
        if(input == document.activeElement) unsetValidation($(input));
      }
      if(input.value == "") unsetValidation($(input));
    });
  } function valMail() {
    inputs.mail.toArray().forEach(input => {
      if(input.value == '') unsetValidation($(input));
      else {
        if(input.value.includes(' ')) setInvalid($(input))
        else if(input == document.activeElement) unsetValidation($(input));
        else {
          if(!/\w+@\w+\.+[a-z]/.test(input.value)) setInvalid($(input));
          else setValid($(input));
        }
      }
    });
  } function valUser() {
    inputs.user.toArray().forEach(input => {
      if(input.value == '') unsetValidation($(input));
      else {
        if(input.value.includes(' ')) setInvalid($(input))
        else if(input == document.activeElement) unsetValidation($(input));
        else {
          setValid($(input));
        }
      }
    });
  } function valPass() {
    var prePassVal = '';
    inputs.pass.toArray().forEach(input => {
      if(input.value != '' && prePassVal != '' && input.value != prePassVal) {
        setInvalid($(input));
      } else if(input.value.length > 7) setValid($(input));
      else if(input.value == '') unsetValidation($(input));
      else setInvalid($(input))
      if(input == document.activeElement) unsetValidation($(input));

      prePassVal = input.value;
    });
  } function valTell() {
    inputs.tell.toArray().forEach(input => {
      if(phonenumber(input)) setValid($(input));
      else setInvalid($(input));

      if(input == document.activeElement || input.value == '') unsetValidation($(input));
    });
  }
};

function setValid(QueryObject) {
  QueryObject.removeClass('is-invalid');
  QueryObject.addClass('is-valid');
} function setInvalid(QueryObject) {
  QueryObject.removeClass('is-valid');
  QueryObject.addClass('is-invalid');
} function unsetValidation(QueryObject) {
  QueryObject.removeClass('is-invalid');
  QueryObject.removeClass('is-valid');
}

function phonenumber(inputtxt) {
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(inputtxt.value.replace(/ /g, '').match(phoneno)) {
    return true;
  }
  else {
    return false;
  }
}