function navigateToAnotherPage() {
  window.location.href = 'map.php';
}

function redirectToPage() {
  window.location.href = 'home.php';
}

function valid() {
  let user = document.getElementById('user').value;
  console.log(user);
  if (user === "") {
    document.getElementById('user1').innerHTML = "Please fill the user name";
    return false;
  }
  if (user.length < 2) {
    document.getElementById('user1').innerHTML = "Name must be more than 1 character";
    return false;
  }
  if (!/^[a-zA-Z\s]+$/.test(user)) {
    document.getElementById('user1').innerHTML = "Only Alphabets are allowed";
    return false;
  }
  
  else {
    document.getElementById('user1').innerHTML = "";
  }

   let email_id = document.getElementById('email').value;

if (email_id === "") {
  document.getElementById('email1').innerHTML = "Please fill the email";
  return false;
}

let isValidEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

if (!isValidEmail.test(email_id)) {
  document.getElementById('email1').innerHTML = "Invalid email";
  return false;
} else {
  document.getElementById('email1').innerHTML = "";
}

 
  let address = document.getElementById('place').value;
  if (address === "") {
    document.getElementById('location').innerHTML = "Please fill the place name";
    return false;
  }
  if (address.length < 2) {
    document.getElementById('location').innerHTML = "Placename must be more than 1 character";
    return false;
  }
  if (!/^[a-zA-Z\s]+$/.test(address)) {
    document.getElementById('location').innerHTML = "Only Alphabets are allowed";
    return false;
  }
  
  else {
    document.getElementById('location').innerHTML = "";
  }

  let password = document.getElementById('pass').value;
  if (password === "") {
    document.getElementById('pass1').innerHTML = "Please fill the password";
    return false;
  }
  let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  
  if (!passwordPattern.test(password)) {
    document.getElementById('pass1').innerHTML = "Password: must have 8+ chars, 1 uppercase, 1 lowercase, 1 digit";
    return false;
  } else {
    document.getElementById('pass1').innerHTML = "";
  }

  let conpass = document.getElementById('con').value;
  if (conpass !== password) {
    document.getElementById('con1').innerHTML = "Password doesn't match";
    return false;
  }
  else {
    document.getElementById('con1').innerHTML = "";
  }
  return true;
}
