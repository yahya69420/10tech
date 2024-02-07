<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../resources/css/settingsPage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>User Settings</title>
</head>

<body>
    @include('header')
    <nav class="navbar navbar-light bg-light">
        <div>Account Details</div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-1 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('settings') }}"><button class="btn btn-primary">Account Details</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">View Recent Orders</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">Payment Methods</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">Change Password</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">Change Profile Picture</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">Delete Account</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Username</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" value="{{ $user->id }}" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button">Edit Email</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <ul> -->
    <!-- <li><a href="{{ route('settings') }}">Account Details</a></li> -->
    <!-- <li><a href="{{ route('settings') }}">View Recent Orders</a></li>
                <li><a href="{{ route('settings') }}">Payment Methods</a></li>
                <li><a href="{{ route('settings') }}">Change Password</a></li>
                <li><a href="{{ route('settings') }}">Change Profile Picture</a></li>
                <li><a href="{{ route('settings') }}">Delete Account</a></li> -->
    <!-- </ul>
        </div> -->




</body>

</html>