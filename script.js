// --- Form Elememts ---
var user_name = document.getElementById("name");
var email = document.getElementById("email");
var password = document.getElementById("password");
var phone = document.getElementById("phone");
var gender = document.forms.gender;
var languages = document.getElementById("languages");
var zip_code = document.getElementById("zip-code");
var about = document.getElementById("about");

// --- error messages --
var name_error = document.getElementById("name-error");
var email_error = document.getElementById("email-error");
var password_error = document.getElementById("password-error");
var phone_error = document.getElementById("phone-error");
var gender_error = document.getElementById("gender-error");
var language_error = document.getElementById("language-error");
var zipcode_error = document.getElementById("zipcode-error");
var about_error = document.getElementById("about-error");
var success = document.getElementById("success");
var close = document.getElementById("close");

// --- event listeners for some form elements
user_name.addEventListener('keyup', ValidateName)
email.addEventListener('keyup', VerifyEmail)
password.addEventListener('keyup', VerifyPassword)
phone.addEventListener('keyup', VerifyPhone)
gender[0].addEventListener('click', VerifyGender)
gender[1].addEventListener('click', VerifyGender)
gender[2].addEventListener('click', VerifyGender)
languages.addEventListener("click", firstVerifySelect);
zip_code.addEventListener('keyup', VerifyZipcode);
about.addEventListener('keyup', VerifyAbout);
close.addEventListener('click', closeSuccess);

// --- validation functions ---
function ValidateName(){
    if (user_name.value.length == 0){
        name_error.style.display = "block";
        user_name.style.border = "1px solid #c62828";
        user_name.focus();
        return false
    } else {
        name_error.style.display = "none";
        user_name.style.border = "1px solid silver";
        return true;
    }
}

function VerifyEmail(){
    var email_exp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.length == 0){
        email.style.border = "1px solid #c62828";
        email.focus()
        email_error.innerHTML = "Email cannot be empty";
        email_error.style.display = "block";
        return false
    }
    else if (email.value.match(email_exp)){
        email_error.style.display = "none";
        email.style.border = "1px solid silver";
        return true
    } else{
        email.focus()
        email.style.border = "1px solid #c62828";
        email_error.innerHTML = "Please Enter a valid Email";
        email_error.style.display = "block";
        return false
    }
}
function VerifyPassword(){
    if (password.value.length == 0){
        password.focus();
        password.style.border = "1px solid #c62828";
        password_error.innerHTML = "Please Enter your password";
        password_error.style.display = "block";
        return false;
    } else if (password.value.length < 6){
        password.focus();
        password.style.border = "1px solid #c62828";
        password_error.innerHTML = "Password must not be less than 6 characters";
        password_error.style.display = "block";
        return false;
    } else{
        password.style.border = "1px solid silver"
        password_error.style.display = "none";
        return true;
    }
}
function VerifyPhone(){
    var digitExp = /^[0-9]+$/;
    if (phone.value.length == 0){
        phone.focus();
        phone.style.border = "1px solid #c62828";
        phone_error.innerHTML = "Please Enter Your Phone Number";
        phone_error.style.display = "block";
        return false;
    }
    else if (phone.value.length >= 11 && phone.value.match(digitExp)){
        phone_error.style.display = "none";
        phone.style.border = "1px solid silver";
        return true;
    } else{
        phone.focus();
        phone.style.border = "1px solid #c62828";
        phone_error.innerHTML = "Phone Number must not be less than 11 digits";
        phone_error.style.display = "block";
        return false;
    }
}
function VerifyGender(){
    var ischecked = false;
    for (let i = 0; i < gender.length; i++){
        if (gender[i].checked){
            ischecked = true;
            break
        }
    }
    if (ischecked){
        gender_error.style.display = "none";
        return true;
    } else {
        gender_error.style.display = "block";
        return false;
    }
}

var language_attempt = 0
function firstVerifySelect(){
    language_attempt = language_attempt + 1;
    if (language_attempt > 1){
        VerifySelect()
    }
    language_attempt = language_attempt + 1;
}

function VerifySelect(){
    if (languages.value == "Select a Language"){
        languages.focus();
        languages.style.border = "1px solid #c62828";
        language_error.style.display = "block";
        return false;
    } else {
        languages.style.border = "1px solid silver";
        language_error.style.display = "none";
        return true;
    }
}

function VerifyZipcode(){
    var digitExp = /^[0-9]+$/;
    if (zip_code.value.length == 0){
        zip_code.focus();
        zip_code.style.border = "1px solid #c62828";
        zipcode_error.innerHTML = "Please Enter Your Zip Code";
        zipcode_error.style.display = "block";
        return false;
    }
    else if (zip_code.value.length >= 4 && zip_code.value.length <= 6 && phone.value.match(digitExp)){
        zipcode_error.style.display = "none";
        zip_code.style.border = "1px solid silver";
        return true;
    } else{
        zip_code.focus();
        zip_code.style.border = "1px solid #c62828";
        zipcode_error.innerHTML = "Zip code must be between 4 and 6 digits";
        zipcode_error.style.display = "block";
        return false;
    }
}

function VerifyAbout(){
    if (about.value.length == 0){
        about_error.style.display = "block";
        about.style.border = "1px solid #c62828";
        about.focus();
        return false
    } else {
        about_error.style.display = "none";
        about.style.border = "1px solid silver";
        return true;
    }
}

function closeSuccess(){
    success.style.display = "none";
}

// --- form validation ---
function ValidateForm(){
    if (ValidateName() && VerifyEmail() && VerifyPassword() && VerifyPhone()&& VerifyGender() && VerifySelect() && VerifyZipcode() && VerifyAbout()){
        return true
    } else {
        return false;
    }
}