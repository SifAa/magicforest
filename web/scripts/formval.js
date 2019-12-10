// Bootstrap example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      let validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

// Register new user formvalidation
function checkform(){
  let formElement = document.querySelector("#checkform");
  let userName = formElement.username;
  let pass1 = formElement.pass1;
  let pass2 = formElement.pass2;


  let enspasswords = false;
  let passLenght = false;
  if(pass1.value === pass2.value){
      enspasswords = true;
  }

  if(pass1.value.length > 7){
      passLenght = true;
  }

  if(enspasswords && passLenght) {
      return true;
  } else {
      return false; // sender ikke ting til php
  }
} 