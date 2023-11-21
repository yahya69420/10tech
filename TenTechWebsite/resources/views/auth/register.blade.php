<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../resources/css/registerPageFrontEnd.css') }}">
    <!-- Added icon for website -->
    <link rel="icon" href="{{ asset('icons8-register-16.png') }}" type="image/x-icon" />
    <!-- Bootstrap CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Roboto Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <!-- animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BoxIcon CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../resources/js/registerPageFrontEndContinueButtonScript.js"></script>
    <title>Register</title>
</head>

<body>
    <!-- <div class="toggle-darkMode">
        <label class="flex justify-center items-center" id="darkModeText"><label class="flex justify-center items-center" id="lightModeText">Light Mode!</label><input type="checkbox" class="toggle toggle-lg m-1" id= "darkToggle" checked> Dark Mode! </label>
    </div> -->
    <div class="registerCard p-5 rounded-md w-96">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Card title -->
            <h1 class="text-3xl font-bold text-center p-5 pb-0">Create an account</h1>
            <p class="text-center font-semibold p-1">Tech awaits you...</p>
            <!-- Email field -->

            <div class="form-control email-form-field">
                <input type="email" id="email" name ="email" autocomplete="on" class="border-1 rounded-full border m-5 border-black" placeholder="Enter your email..." required>
                <i class='bx bxs-x-circle' id="clearEmailIcon"></i>
            </div>
            <p id="emailIssue" class="text-rose-600 font-bold m-2 hidden">Uh oh... That email doesn't look right!</p>


            <!-- Continue Button -->

            <div class="continueButton">
                <button class="btn btn-neutral w-80" id="continue-button" disabled="disabled">
                    Continue
                </button>
            </div>

            <!-- Password label/field -->

            <div id="password-confirm-password" class="hidden form-control">
                <!-- <label for="password" class="label label-text text-black">Password: </label> -->
                <input type="password" id="password" name="password" class="border-1 rounded-full border m-5 border-black" placeholder="Enter your password..." required>
                <i class='bx bxs-hide' id="showPassIcon"></i>

                <!-- <label for="password-confirm" class="label label-text text-black">Confirm password: </label> -->
                <!-- <input type="password-confirm" class="border-1 rounded-full border m-5 " id="password-confirm" name="password-confirm" placeholder="Confirm your password..." required /> -->
            </div>
            <div id="passwordErrorMessages">
                <p id="lengthError" class="text-rose-600 font-bold m-2 hidden">You need a minimum of 8 characters</p>
                <p id="lowerCaseError" class="text-rose-600 font-bold m-2 hidden">You need a lower case character</p>
                <p id="upperCaseError" class="text-rose-600 font-bold m-2 hidden">You need an upper case character</p>
                <p id="digitError" class="text-rose-600 font-bold m-2 hidden">You need a digit</p>
                <p id="capsLock" class="text-rose-600 font-bold m-2 hidden">Caps lock is ON</p>
            </div>


            <!-- remember me toggle -->
            <div class="remember-me hidden" id="remember-me-toggle">
                <label class="flex justify-center items-center"><input type="checkbox" class="toggle toggle-info m-2" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked> Remember Me! </label>
            </div>


            <div id="registerButton" class="hidden form-control">
                <!-- remove the disabled attribute if the validation passes and add an animation to the button when validation passes as it becomes active-->
                <button type="submit" class="btn btn-active btn-accent" id="registerButtonTag" disabled="disabled">
                    Register
                </button>
            </div>

            <!-- login button if account exists -->
            <div class="login-link text-center pt-2">
                <p>Already have an account? <a href="login" class="font-bold">Log in</a></p>
            </div>

        </form>


</body>
<!-- link for dark mode abstarct bg image for attribtuon in the footer: <a href="https://www.freepik.com/free-vector/black-abstract-background_21173239.htm#query=dark%20mode%20abstract&position=4&from_view=search&track=ais">Image by pikisuperstar</a> on Freepik -->
<!-- link for the abstract bg image for attribution in the footer: <a href="https://www.freepik.com/free-vector/abstract-banner-with-low-poly-plexus-network-communications-design_10135315.htm#query=website%20background%20technology&position=14&from_view=search&track=ais">Image by kjpargeter</a> on Freepik -->
<!-- link for the icon recognition: <a target="_blank" href="https://icons8.com/icon/43970/add-user-male">Register</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a> -->

</html>