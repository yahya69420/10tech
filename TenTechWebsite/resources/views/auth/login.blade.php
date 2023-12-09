<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('loginPage.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="content">
    <div class="signin-form">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email"></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required>

            <div class="password-section" style="display: none;">
                <label for="password"></label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <i class='bx bxs-hide' id="passwordicon" onclick="togglePasswordVisibility()"></i>
                </div>
            </div>

            <button type="button" onclick="showPasswordSection()">Continue</button>

            <button type="submit" style="display: none;">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
    </div>
</div>

<!-- JavaScript -->
<script>
    function showPasswordSection() {
        const passwordSection = document.querySelector(".password-section");
        const continueButton = document.querySelector("button[onclick='showPasswordSection()']");
        const loginButton = document.querySelector("button[type='submit']");

        passwordSection.style.display = "block";
        continueButton.style.display = "none";
        loginButton.style.display = "block";
    }

    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</body>
</html>
