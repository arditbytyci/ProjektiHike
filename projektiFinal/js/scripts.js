function validate(){
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  var error_message = document.getElementById("error_message");
  
  error_message.style.padding = "10px";
  
  var text;
  if(name.length < 5){
    text = "Please Enter Name";
    error_message.innerHTML = text;
    return false;
  }

  if(email.indexOf("@") == -1 || email.length < 6){
    text = "Please Enter Email";
    error_message.innerHTML = text;
    return false;
  }
  if(message.length <= 50){
    text = "Please Enter More Than 50 Characters";
    error_message.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}
