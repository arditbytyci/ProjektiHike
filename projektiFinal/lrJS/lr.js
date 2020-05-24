function changeForm(form) {
    let forms = document.querySelectorAll("form>div");
    if (form == 0) {
        forms[0].classList.remove("hidden");
        forms[0].classList.add("form-style");
        forms[1].classList.add("hidden");
        forms[1].classList.remove("form-style");
    } else {
        forms[1].classList.remove("hidden");
        forms[1].classList.add("form-style");
        forms[0].classList.add("hidden");
        forms[0].classList.remove("form-style");
    }
}

function validateLogin() {
  var email = document.getElementById('email');
  var password = document.getElementById('password');

  if(email.value.trim() == "") {
      alert("Please fill your information.");
    email.focus();
  } else if(password.value.trim() == "") {
    alert("Please type your password.");
  }
}


function validateRegister() {
  var email = document.getElementById('email2');
  var password = document.getElementById('password2');
  var confirmpw = document.getElementById('confirmPw');




  if(email.value.trim() == "") {

    email.focus();


  } else if(password.value.trim() == "") {
    alert("Please type your password.");
  }

  if(password.value != confirmPw.value) {
    alert("Passwords dont match.");
  }


}
