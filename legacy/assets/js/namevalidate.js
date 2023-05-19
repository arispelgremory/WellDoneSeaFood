function validateForm() {
  var fname = document.forms["myForm"]["Fname"].value;
  var lname = document.forms["myForm"]["Lname"].value;
  var username = document.forms["myForm"]["Username"].value;
  var email1 = document.forms["myForm"]["Email"].value;
  var password = document.forms["myForm"]["password"].value;
  var cfpassword = document.forms["myForm"]["Confirm Password"].value;
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{7,8})$/;
  var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var passwordvalid = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,20}$/;

  if (fname == "") {
    document.getElementById("errormessage").innerHTML =
      "First Name must be filled out！";
    return false;
  }
  if (lname == "") {
    document.getElementById("errormessage").innerHTML =
      "Last Name must be filled out！";
    return false;
  }
  if (username == "") {
    document.getElementById("errormessage").innerHTML =
      "Username must be filled out！";
    return false;
  }
  if (document.forms["myForm"]["PhoneNum"].value == "") {
    document.getElementById("errormessage").innerHTML =
      "Phone number must be filled out！";
    return false;
  }
  if (!document.forms["myForm"]["PhoneNum"].value.match(phoneno)) {
    document.getElementById("errormessage").innerHTML =
      "Follow the format of the phone number, such as 012-1234567";
    return false;
  }
  if (email1 == "") {
    document.getElementById("errormessage").innerHTML =
      "Email must be filled out！";
    return false;
  }
  if (!email1.match(email)) {
    document.getElementById("errormessage").innerHTML =
      "Follow the format of the Email address!";
    return false;
  }
  if (password == "") {
    document.getElementById("errormessage").innerHTML =
      "Password must be filled out！";
    return false;
  }
  if (!password.match(passwordvalid)) {
    document.getElementById("errormessage").innerHTML =
      "Password must be at least have two letters with an uppercase and a lowercase！";
    return false;
  }

  if (cfpassword !== password) {
    document.getElementById("errormessage").innerHTML =
      "Confirm Password must be same with the password！";
    return false;
  }
}
