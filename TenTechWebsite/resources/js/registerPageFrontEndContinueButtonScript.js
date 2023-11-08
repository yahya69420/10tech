document.addEventListener("DOMContentLoaded", function () {
    const continueButton = document.getElementById("continue-button");
    const passwordFields = document.getElementById("password-confirm-password");
    const passwordField = document.getElementById("password");
    const emailField = document.getElementById("email");
    const clearIcon = document.getElementById("clearEmailIcon");
    const singlePassField = document.getElementById("password");
    const registerButton = document.getElementById("registerButton");
    const rememberMeToggle = document.getElementById("remember-me-toggle");
    // get the icon into JS
    const showPasswordIcon = document.getElementById("showPassIcon");




    const darkToggle = document.getElementById('darkToggle');
    darkToggle.addEventListener('change', function() {
        if (darkToggle.checked) {
            document.body.style.background = "url('../resources/images/registerBgImageDark.jpg') no-repeat";
            document.body.style.backgroundSize = "cover";
            document.body.style.backgroundPosition = "center";
            document.getElementById("darkModeText").style.color = "white";
        }
        else {
            document.body.style.background = "url('../resources/images/registerBgImage.jpg') no-repeat";
            document.body.style.backgroundSize = "cover";
            document.body.style.backgroundPosition = "center";
            document.getElementById("darkModeText").style.color = "black";

        }
    })



    continueButton.addEventListener("click", function () {
        passwordFields.style.display = "flex";
        continueButton.style.display = "none";
        // get rid of ugly gap that was still present when continue was pressed
        continueButton.style.padding = "0px";
        registerButton.style.display = "flex";

        // show the toggle only when the continue button is pressed
        rememberMeToggle.style.display = "flex";

        // when icon clicked, show password
        showPasswordIcon.addEventListener("click", function () {
            this.classList.toggle("bxs-show");
            if (singlePassField.type === "password") {
                singlePassField.type = "text";
            } else {
                singlePassField.type = "password";
            }
        });
    });

    clearIcon.addEventListener("click", function () {
        emailField.value = "";
    });


    const emailIssue = document.getElementById("emailIssue");

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    

    function validateEmail() {
        const emailValue = emailField.value.trim();
        if (emailRegex.test(emailValue)) {
            emailIssue.style.display = 'none';
            continueButton.removeAttribute('disabled');
        }
        else {
            emailIssue.style.display = 'block';
            continueButton.setAttribute('disabled', 'disabled');
        }
    }








    function validatePassword() {
        const passwordValue = passwordField.value;
        let lengthIssue = false;
        let upperCaseIssue = false;
        let lowerCaseIssue = false;
        let digitIssue = false;
        const passwordErrorMessages = document.getElementById("passwordErrorMessages")
        const registerButtonTag = document.getElementById("registerButtonTag");

        if (passwordValue.length < 8) {
            lengthIssue = true;
        }
        
        if (!/[A-Z]/.test(passwordValue)) {
            upperCaseIssue = true;
        }

        if (!/[a-z]/.test(passwordValue)) {
            lowerCaseIssue = true;
        }

        if (!/[0-9]/.test(passwordValue)) {
            digitIssue = true;
        }


        if (!lengthIssue && !lowerCaseIssue && !upperCaseIssue && !digitIssue) {
            passwordErrorMessages.style.display = 'none';
            registerButtonTag.removeAttribute('disabled');
            registerButton.classList.add('animate__animated' ,'animate__flipInX', 'animate-infinite');
            registerButton.addEventListener('animationend', function() {
                registerButton.classList.remove('animate__animated' ,'animate__flipInX', 'animate-infinite');
            })

        }
        else {
            passwordErrorMessages.style.display = 'block';
            passwordErrorMessages.innerHTML = '';
            registerButtonTag.setAttribute('disabled', 'disabled');
            
            if (lengthIssue) {
                passwordErrorMessages.innerHTML += '<p id="lengthError" class="text-rose-600 font-bold m-2">You need a minimum of 8 characters</p>'; 
            }

            if (lowerCaseIssue) {
                passwordErrorMessages.innerHTML += '<p id="lowerCaseError" class="text-rose-600 font-bold m-2">You need a lower case character</p>'; 
            }

            if (upperCaseIssue) {
                passwordErrorMessages.innerHTML += '<p id="upperCaseError" class="text-rose-600 font-bold m-2">You need an upper case character</p>'; 
            }

            if (digitIssue) {
                passwordErrorMessages.innerHTML += '<p id="digitError" class="text-rose-600 font-bold m-2">You need a digit</p>'; 
            }

        }
    }



    emailField.addEventListener('input', validateEmail);
    passwordField.addEventListener('input', validatePassword);
});

