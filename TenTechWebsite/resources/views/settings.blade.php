<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../resources/css/settingsPage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title id="title">Account Details</title>
</head>

<body>
    @include('header')
    <nav class="navbar navbar-light bg-light">
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-1 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('settings') }}"><button class="btn btn-primary">Account Details</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">View Recent Orders</button></a>
                        <a href="{{ route('settings') }}"><button class="btn btn-light">Payment Methods</button></a>
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="passwordButton">Change Password</button></a>
                        <a href="#"> <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#profilePictureChangeModal" id="profilePictureChangeButton">Change Profile Picture</button></a>
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteAccount" id="deleteButton">Delete Account</button></a>
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
                                        <button class="btn btn-danger" type="button">Edit Email</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change Password </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalCross"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update-password') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="old-password" placeholder="Old Password" name="old-password">
                            <label for="old-password" class="col-form-label">Old Password:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="new-password" placeholder="New Password" required name="new-password">
                            <label for="new-password" class="col-form-label">New Password:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm-new-password" placeholder="Confirm New Password" required name="confirm-new-password">
                            <label for="confirm-new-password" class="col-form-label">Confirm New Password:</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="closeModal">Close</button>
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountLabel">Are you sure you want to delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalDeleteAcc"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    <form action="{{ url('delete-account') }}" method="POST">
                        @csrf
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="closeModalCrossDeleteAcc">Don't Delete!</button>
                            <button type="submit" class="btn btn-danger">Understood. Delete Account!</button>
                        </div>
                    </form>
                    @if(session('error'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: true,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "{{ session('success') }}"
                        });
                    </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "Success!",
            html: "{{ session('success') }}",
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    </script>
    @elseif(session('error'))
    <script>
        let timerInterval;
        Swal.fire({
            icon: 'error',
            title: "Error!",
            html: "{{ session('error') }}",
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    </script>
    @endif
    <div class="modal fade" id="profilePictureChangeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="profilePictureChangeModalLabel">Change profile picture</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="profilePictureChangeButtonCrossModal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::user()->profile_image == null)
                        <div class="text-center mb-3">
                            <img src="account.png" alt="Profile Image" class="img-fluid" style="max-width: 45%; max-height: 45%;">
                        </div>
                        @else
                        <div class="text-center mb-3">
                            <img src="{{ Auth::user()->profile_image }}" alt="Profile Image" class="img-fluid" style="max-width: 45%; max-height: 45%;">
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="new-profile-image" class="form-label">Upload New Profile Picture</label>
                            <input type="file" accept="image/*" class="form-control" id="new-profile-image" name="new_profile_image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="profilePictureChangeFooterClose">Close</button>
                            <button type="submit" class="btn btn-success">Save Profile Picture</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordButton = document.getElementById('passwordButton');
        var closeModalCross = document.getElementById('closeModalCross');
        var closeModal = document.getElementById('closeModal');

        var closeModalCrossDeleteAcc = document.getElementById('closeModalCrossDeleteAcc');
        var closeModalDeleteAcc = document.getElementById('closeModalDeleteAcc');

        var profilePictureChangeButton = document.getElementById('profilePictureChangeButton');
        var profilePictureChangeButtonCrossModal = document.getElementById('profilePictureChangeButtonCrossModal');
        var profilePictureChangeModal = document.getElementById('profilePictureChangeFooterClose');

        profilePictureChangeButton.addEventListener('click', function() {
            profilePictureChangeButton.className = 'btn btn-primary';
        });

        profilePictureChangeButtonCrossModal.addEventListener('click', function() {
            profilePictureChangeButton.className = 'btn btn-light';
        });

        profilePictureChangeModal.addEventListener('click', function() {
            profilePictureChangeButton.className = 'btn btn-light';
        });


        passwordButton.addEventListener('click', function() {
            passwordButton.className = 'btn btn-primary';
        });

        deleteButton.addEventListener('click', function() {
            deleteButton.className = 'btn btn-primary';
        });

        closeModalCross.addEventListener('click', function() {
            passwordButton.className = 'btn btn-light';
        });

        closeModal.addEventListener('click', function() {
            passwordButton.className = 'btn btn-light';
        });

        closeModalCrossDeleteAcc.addEventListener('click', function() {
            deleteButton.className = 'btn btn-light';
        });

        closeModalDeleteAcc.addEventListener('click', function() {
            deleteButton.className = 'btn btn-light';
        });

        var title = document.getElementById('title');
        if (passwordButton.addEventListener('click', function() {
                title.innerHTML = 'Change Password';
            }));

        if (closeModalCross.addEventListener('click', function() {
                title.innerHTML = 'Account Details';
            }));
        if (closeModal.addEventListener('click', function() {
                title.innerHTML = 'Account Details';
            }));

        if (deleteButton.addEventListener('click', function() {
                title.innerHTML = 'Delete Account';
            }));
    });
</script>
</html>