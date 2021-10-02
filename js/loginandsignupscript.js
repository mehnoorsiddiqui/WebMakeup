

const loginBtn = document.querySelectorAll(".login-btn"),
    registerBtn = document.querySelectorAll(".register-btn"),
    lostPassBtn = document.querySelectorAll(".lost-pass-btn"),
    box = document.querySelector(".login-box"),
    loginForm = document.querySelector(".login-form"),
    registerForm = document.querySelector(".register-form"),
    lostPasswordForm = document.querySelector(".lost-password-form");

registerBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        box.classList.add("slide-active");
        registerForm.classList.remove("form-hidden");
        loginForm.classList.add("form-hidden");
        lostPasswordForm.classList.add("form-hidden");
    });
});

loginBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        box.classList.remove("slide-active");
        registerForm.classList.add("form-hidden");
        loginForm.classList.remove("form-hidden");
        lostPasswordForm.classList.add("form-hidden");
    });
});

lostPassBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        registerForm.classList.add("form-hidden");
        loginForm.classList.add("form-hidden");
        lostPasswordForm.classList.remove("form-hidden");
    });
});


function user_register() {
    var name = document.querySelector("#name").value;
    var email = document.querySelector("#email").value;
    var mobile = document.querySelector("#mobile").value;
    var password = document.querySelector("#password").value;
    document.querySelector('.field_error').innerHTML = '';
    var is_error = '';
    if (name == "") {
        document.querySelector('#name_error').innerHTML = 'Please enter name';
        is_error = 'yes';
    } if (email == "") {
        document.querySelector('#email_error').innerHTML = 'Please enter email';
        is_error = 'yes';
    }
    if (mobile == "") {
        document.querySelector('#mobile_error').innerHTML = 'Please enter mobile';
        is_error = 'yes';
    }
    if (password == "") {
        document.querySelector('#password_error').innerHTML = 'Please enter password';
        is_error = 'yes';
    }
    if (is_error == '') {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "register_submit.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                if (response == 'email_present') {
                    document.querySelector('#email_error').innerHTML = 'Email id already present';
                }
                if (response == 'mobile_present') {
                    document.querySelector('#mobile_error').innerHTML = 'Mobile number already present';
                }
                if (response == 'insert') {
                    document.querySelector('.register_msg p').innerHTML = 'Thank you for registeration';

                }
            }
        };
        var data = new URLSearchParams({ name, email, mobile, password });
        ajax.send(data);
    }
}

function user_login() {
    var email = document.querySelector("#login_email").value;
    var password = document.querySelector("#login_password").value;
    document.querySelector('.field_error').innerHTML = '';
    var is_error = '';

    if (email == "") {
        document.querySelector('#login_email_error').innerHTML = 'Please enter email';
        is_error = 'yes';
    }
    if (password == "") {
        document.querySelector('#login_password_error').innerHTML = 'Please enter password';
        is_error = 'yes';
    }
    if (is_error == '') {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "login_submit.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                if (response == 'wrong') {
                    document.querySelector('.login_msg p').innerHTML = 'Please enter valid login details';
                }
                if (response == 'valid') {
                    window.location.href = window.location.href;
                }
            }
        };
        var data = new URLSearchParams({ email, password });
        ajax.send(data);
    }
}

function email_sent_otp() {
    document.querySelector('#email_error').innerHTML = '';
    var email = document.querySelector('#email').value;
    if (email == '') {
        document.querySelector('#email_error').innerHTML = 'Please enter email id';
    } else {
        document.querySelector('.email_sent_otp').innerHTML = 'Please wait..';
        document.querySelector('.email_sent_otp').setAttribute("disabled", false);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "send_otp.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                if (response == 'done') {
                    document.querySelector('#email').setAttribute("disabled", true);
                    document.querySelector('.email_sent_otp').style.display = 'none';
                    document.querySelector('.email_verify_otp').style.display = 'block';
                    document.querySelector('#verify_button').style.display = 'block';
                   
                }
                else if (response == 'email_present') {
                    document.querySelector('.email_sent_otp').innerHTML = 'Send OTP';
                    document.querySelector('.email_sent_otp').setAttribute("disabled", false);
                    document.querySelector('#email_error').innerHTML = 'Email id already exists';
                }
                else {
                    document.querySelector('.email_sent_otp').innerHTML = 'Send OTP';
                    document.querySelector('.email_sent_otp').setAttribute("disabled", false);
                    document.querySelector('#email_error').innerHTML = 'Please try after sometime';
                }
            }
        };
        let type = 'email';
        var data = new URLSearchParams({ email, type });
        ajax.send(data);

    }


}


 function email_verify_otp() {
    document.querySelector('#email_error').innerHTML = '';
    var email_otp = document.querySelector('#email_otp').value;
    if (email_otp == '') {
        document.querySelector('#email_error').innerHTML = 'Please enter OTP';
    }
    else {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "check_otp.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                if (response == 'done') {
                    document.querySelector('.email_verify_otp').style.display = 'none';
                    document.querySelector('#verify_button').style.display = 'none';
                    document.querySelector('#email_otp_result').innerHTML = 'Email id verified';
                    document.querySelector('#btn_register').removeAttribute('disabled');
                }
                else {
                    document.querySelector('#email_error').innerHTML = 'Please enter valid OTP';
                }
            }
        };
        let type = 'email';
        var data = new URLSearchParams({ email_otp, type });
        ajax.send(data);

    }

}


// Forgpt password function
function forgot_password() {
    document.querySelector('#f_email_error').innerHTML = '';
    var email = document.querySelector("#f_email").value;
    if (email == '') {
        document.querySelector('#f_email_error').innerHTML = 'Please enter email id';
    } else {
        document.querySelector('#f_btn_submit').innerHTML = "Please wait..."
        document.querySelector('#f_btn_submit').setAttribute("disabled", true);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "forgot_password_submit.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                document.querySelector("#f_email").value = "";
                if (response.includes('no account')) {
                    document.querySelector('#f_email_error').innerHTML = response;
                }
                else {
                    document.querySelector('#f_email_response').innerHTML = response;
                }
                document.querySelector('#f_btn_submit').innerHTML = "Reset Password"
                document.querySelector('#f_btn_submit').removeAttribute('disabled');
            }
        };
        var data = new URLSearchParams({ email });
        ajax.send(data);
    }
}
// To update the name of the user
function update_profile() {
    document.querySelector('.field_error').innerHTML = '';
    var name = document.querySelector("#a-name").value;
    if (name == '') {
        document.querySelector('#name_error').innerHTML = 'Please enter name';
    }
    else {
        document.querySelector('#btn_submit').innerHTML = "Please wait..."
        document.querySelector('#btn_submit').setAttribute("disabled", true);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "update_profile.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                document.querySelector('#name_error').innerHTML = response;
                document.querySelector('#btn_submit').innerHTML = "Save"
                document.querySelector('#btn_submit').removeAttribute('disabled');
            }
        };
        var data = new URLSearchParams({ name });
        ajax.send(data);
    }
}
// To update the password of the user
function update_password() {
    document.querySelector('.field_error').innerHTML = '';
    var current_password = document.querySelector("#current_password").value;
    var new_password = document.querySelector("#new_password").value;
    var confirm_new_password = document.querySelector("#confirm_new_password").value;
    var is_error = '';
    if (current_password == '') {
        document.querySelector('#current_password_error').innerHTML = 'Please enter password';
        is_error = 'yes';
    } if (new_password == '') {
        document.querySelector('#new_password_error').innerHTML = 'Please enter password';
        is_error = 'yes';
    } if (confirm_new_password == '') {
        document.querySelector('#confirm_new_password_error').innerHTML = 'Please enter password';
        is_error = 'yes';
    }
    if (new_password != '' && confirm_new_password != '' && new_password != confirm_new_password) {
        document.querySelector('#confirm_new_password_error').innerHTML = 'Please enter same password';
        is_error = 'yes';
    }

    if (is_error == '') {
        document.querySelector('#btn_update_password').innerHTML = "Please wait...";
        document.querySelector('#btn_update_password').setAttribute("disabled", true);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "update_password.php", true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;
                document.querySelector('#confirm_new_password_error').innerHTML ='';
                 document.querySelector('#current_password_error').innerHTML = response;
                 document.querySelector('#btn_update_password').innerHTML = "Save"
                 document.querySelector('#btn_update_password').removeAttribute('disabled');
                 document.getElementById('frmPassword').reset();
            }
        };
        var data = new URLSearchParams({current_password,new_password});
        ajax.send(data);
    }
}