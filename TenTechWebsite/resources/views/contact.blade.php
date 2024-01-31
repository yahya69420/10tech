<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>

<style>


  <style>

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
    }


    .hero {
      background-image: white;
      height: 25vh;
      width: 100%;
    }

    .hero p {
      color: white;
      text-align: center;
      padding-top: 8vh;
    }

.contact-us {
  display: flex;
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.left, .right {
  flex: 1;
  padding: 20px;
}

.left {
  background-color: #ccc;
}

.left h2 {
  margin-top: 0;
}

.right textarea {
  width: 100%;
  height: 150px;
  padding: 10px;
  box-sizing: border-box;
  resize: none;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  margin-bottom: 20px;
}

input[type="text"],
input[type="email"] {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
}

input[type="submit"] {
  background-color: #7f807f;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}


</style>
</head>
<body>
    @include('header')
    <div class="hero">
        <p>This is the hero section</p>
      </div>

      <div class="contact-us">
        <div class="left">
          <h2>Contact Information</h2>
          <form action="#" method="post">
            <input type="text" id="name" placeholder="First Name" required>
            <input type="text" id="lname" placeholder="Last Name" required>
            <input type="email" id="email" placeholder="Email" required>
          </form>
        </div>
        <div class="right">
          <h2>Message</h2>
          <textarea id="subject" placeholder="Your message here" required></textarea>
          <input type="submit" id="submit" value="Submit" required>
          <p id="submittedMessage" style="color: green;"></p>
        </div>
      </div>
      <script>
        // JavaScript code for form validation
        const nameInput = document.querySelector("#name");
        const lnameInput = document.querySelector("#lname");
        const emailInput = document.querySelector("#email");
        const subjectInput = document.querySelector("#subject");
        const submittedMessage = document.querySelector("#submittedMessage");

        function validateForm() {
          clearMessages();

          let errorFlag = false;

          if (nameInput.value.length < 1) {
            alert("Name cannot be blank");
            nameInput.classList.add("error-border");
            errorFlag = true;
          }

          if (lnameInput.value.length < 1) {
            alert("Last name cannot be blank");
            lnameInput.classList.add("error-border");
            errorFlag = true;
          }

          if (subjectInput.value.length < 1) {
            alert("Subject cannot be blank");
            subjectInput.classList.add("error-border");
            errorFlag = true;
          }

          if (!emailIsValid(emailInput.value)) {
            alert("Email is invalid");
            emailInput.classList.add("error-border");
            errorFlag = true;
          }

          if (!errorFlag) {
            // Form is successfully validated
            submittedMessage.innerText = "Submitted";
            return false; // Prevent form submission
          }
        }

        function clearMessages() {
          nameInput.classList.remove("error-border");
          lnameInput.classList.remove("error-border");
          subjectInput.classList.remove("error-border");
          emailInput.classList.remove("error-border");
          submittedMessage.innerText = ""; // Clear the submitted message
        }

        function emailIsValid(email) {
          let pattern = /\S+@\S+\.\S+/;
          return pattern.test(email);
        }

        const submitButton = document.getElementById("submit");
        submitButton.addEventListener("click", function (event) {
          if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
          }
        });
      </script>
    @include('layouts/footer')
    </body>
    </html>
