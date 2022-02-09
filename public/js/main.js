const onlyNumbers = n => {
    return n.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g,'-').replace(/[^\-\d]/g,'');
}

document.getElementById('lastname').focus();

const lastname = document.getElementById('lastname');
const firstname = document.getElementById('firstname');
const email = document.getElementById('email');
const postcode = document.getElementById('postcode');
const address = document.getElementById('address');
const opinion = document.getElementById('opinion');
const submit = document.getElementById('submit-btn');


const contactForm = document.getElementById('contact-form');
const lastnameError = document.getElementById('error--lastname');
const firstnameError = document.getElementById('error--firstname');
const emailError = document.getElementById('error--email');
const postcodeError = document.getElementById('error--postcode');
const addressError = document.getElementById('error--address');
const opinionError = document.getElementById('error--opinion');

contactForm.addEventListener('change', errorMessage);
contactForm.addEventListener('input', errorMessage);
submit.addEventListener('click', errorMessage);

function errorMessage() {
  lastnameError.innerHTML = lastname.validationMessage;
  firstnameError.innerHTML = firstname.validationMessage;
  emailError.innerHTML = email.validationMessage;
  postcodeError.innerHTML = postcode.validationMessage;
  addressError.innerHTML = address.validationMessage;
  opinionError.innerHTML = opinion.validationMessage;
}