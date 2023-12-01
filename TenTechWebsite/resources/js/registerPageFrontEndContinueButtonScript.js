document.addEventListener("DOMContentLoaded", function () {
    // the continue button stored in var
    const continueButton = document.getElementById("continue-button");
        // the password fields all-in-all stored in var
    const passwordFields = document.getElementById("password-confirm-password");
    // the email field stored in var
    const emailField = document.getElementById("email");
    // the clear email field icon stored in var to allow for clearing email field
    const clearIcon = document.getElementById("clearEmailIcon");
        // the single password field stored in var
    const singlePassField = document.getElementById("password");
    // the register button stored in var
    const registerButton = document.getElementById("registerButton");
    // get the icon into JS
    const showPasswordIcon = document.getElementById("showPassIcon");

    // get the toggle input into JS
    const darkToggle = document.getElementById("darkToggle");
    darkToggle.addEventListener("change", function () {
        if (darkToggle.checked) {
            document.body.style.backgroundColor = "rgb(40, 40, 40)"; 
        } else {
            document.body.style.backgroundColor = "rgb(203, 203, 203)";
        }
    });

    continueButton.addEventListener("click", function () {
        passwordFields.classList.add(
            "animate__animated",
            "animate__fadeInUp",
            "animate-infinite");
        passwordFields.style.display = "flex";
        continueButton.style.display = "none";
        // get rid of ugly gap that was still present when continue was pressed
        continueButton.style.padding = "0px";
        registerButton.classList.add(
            "animate__animated",
            "animate__fadeInUp",
            "animate-infinite");
        registerButton.style.display = "flex";

        document.getElementById("login-link").classList.add("animate__animated", "animate__fadeInUp","animate-infinite");


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

    const emailIssueIndicator = document.getElementById("email-strength-indicator");
    const emailValidityMessage = document.getElementById("email-length-indicator");

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    function validateEmail() {
        const emailValue = emailField.value.trim();
        if (emailRegex.test(emailValue)) {
            emailIssueIndicator.style.color = "green";
            emailValidityMessage.style.backgroundColor = "green";
            continueButton.removeAttribute("disabled");
            continueButton.style.color= "white";
        } else {
            emailIssueIndicator.style.color = "red";
            emailValidityMessage.style.backgroundColor = "red";
            continueButton.setAttribute("disabled", "disabled");
        }
    }

    function validatePassword() {
        const passwordValue = singlePassField.value;
        const passwordIndicator = document.getElementById("length-indicator");
        const passwordErrorMessage = document.getElementById("password-strength-indicator");
        const registerButtonTag = document.getElementById("registerButtonTag");


        const isLengthValid = passwordValue.length >= 8;
        const isUpperCase = /[A-Z]/.test(passwordValue);
        const isLowerCase = /[a-z]/.test(passwordValue);
        const isDigitPresent = /[0-9]/.test(passwordValue);

        if (isLengthValid && isUpperCase && isLowerCase && isDigitPresent) {
            passwordIndicator.style.backgroundColor = "green";
            passwordErrorMessage.style.color = "green"; 
            registerButtonTag.removeAttribute("disabled");
            registerButtonTag.style.backgroundColor = "black";
            registerButtonTag.style.color = "white";
            registerButton.classList.add(
                "animate__animated",
                "animate__flipInX",
                "animate-infinite");
        }
        else if (isLengthValid && (isUpperCase || isLowerCase || isDigitPresent)) {
            passwordIndicator.style.backgroundColor = "orange";
            passwordErrorMessage.style.color = "orange"; 
            registerButtonTag.setAttribute("disabled", "disabled");
            registerButtonTag.style.backgroundColor = "lightgrey";
            registerButtonTag.style.color = "darkgrey";
            registerButton.classList.remove(
                "animate__animated",
                "animate__flipInX",
                "animate-infinite");
        }
        else {
            passwordIndicator.style.backgroundColor = "red";
            passwordErrorMessage.style.color = "red"; 
            registerButtonTag.setAttribute("disabled", "disabled");
            registerButtonTag.style.backgroundColor = "lightgrey";
            registerButtonTag.style.color = "darkgrey";
            registerButton.classList.remove(
                "animate__animated",
                "animate__flipInX",
                "animate-infinite");
        }
    }


    // w3 schools - how to js detect caps lock
    // let capsLockState = false;
    // function capsLockCheck(event) {
    //     if (event.getModifierState("CapsLock") && !capsLockState) {
    //         passwordIndicator.innerHTML = '<p id="capsLock" class="text-rose-600 font-bold m-2">Caps lock is ON!</p>';
    //         capsLockState = true;
    //     } else  if (!event.getModifierState("CapsLock") && capsLockState){
    //         passwordIndicator.innerHTML = '<p id="capsLock" class="text-rose-600 font-bold m-2 hidden">Caps lock is ON!</p>';
    //         capsLockState = false;
    //     }
    // }

    emailField.addEventListener("input", validateEmail);
    singlePassField.addEventListener("input", validatePassword);
    // singlePassField.addEventListener("keydown", capsLockCheck);
});
