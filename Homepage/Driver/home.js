function navigateToAnotherPage() {
  console.log('debug')
  window.location.href = 'map.php';
}

function redirectToPage() {
  window.location.href = 'home.php';
}

function validation() {
  let user = document.getElementById('user').value;
  console.log(user);
  if (user === "") {
    document.getElementById('userr').innerHTML = "Please fill the user name";
    return false;
  }
  if (user.length < 2) {
    document.getElementById('userr').innerHTML = "Name must be more than 1 character";
    return false;
  }
  if (!/^[a-zA-Z\s]+$/.test(user)) {
    document.getElementById('userr').innerHTML = "Only Alphabets are allowed";
    return false;
  }
  
  else {
    document.getElementById('userr').innerHTML = "";
  }

  let number = document.getElementById('num').value;
  if (number === "") {
    document.getElementById('numm').innerHTML = "Please fill your number";
    return false;
  }
  if (isNaN(number)) {
    document.getElementById('numm').innerHTML = "Alphabets are not allowed";
    return false;
  }
  if (number.length !== 10) {
    document.getElementById('numm').innerHTML = "Number must be 10 digits";
    return false;
  }
  else {
    document.getElementById('numm').innerHTML = "";
  }

  let regno = document.getElementById('reg').value;
  if (regno === "") {
    document.getElementById('regno').innerHTML = "Please fill vehicle registration number";
    return false;
  }
  if (isNaN(regno)) {
    document.getElementById('regno').innerHTML = "Alphabets are not allowed";
    return false;
  }
  else {
    document.getElementById('regno').innerHTML = "";
  }

  let license = document.getElementById('lic').value;
  if (license === "") {
    document.getElementById('licen').innerHTML = "Please fill your license number";
    return false;
  }
  if (isNaN(license)) {
    document.getElementById('licen').innerHTML = "Alphabets are not allowed";
    return false;
  }
  else {
    document.getElementById('licen').innerHTML = "";
  }

  let password = document.getElementById('pass').value;
  if (password === "") {
    document.getElementById('passs').innerHTML = "Please fill the password";
    return false;
  }
  
  let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  
  if (!passwordPattern.test(password)) {
    document.getElementById('passs').innerHTML = "Password: must have 8+ chars, 1 uppercase, 1 lowercase, 1 digit";
    return false;
  } else {
    document.getElementById('passs').innerHTML = "";
  }

  let conpass = document.getElementById('con').value;
  if (conpass !== password) {
    document.getElementById('conn').innerHTML = "Password doesn't match";
    return false;
  }
  else {
    document.getElementById('conn').innerHTML = "";
  }

  return true;
}
