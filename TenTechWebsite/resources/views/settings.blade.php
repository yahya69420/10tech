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
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#userPaymentModal" id="userPaymentButton">Payment Methods</button></a>
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#userAddressModal" id="userAddressButton">User Address</button></a>
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="passwordButton">Change Password</button></a>
                        <a href="#"> <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#profilePictureChangeModal" id="profilePictureChangeButton">Change Profile Picture</button></a>
                        <a href="#"> <button type=" button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteAccount" id="deleteButton">Delete Account</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h3 class="mb-2">Account Information</h3>
                            <label for="userName" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled readonly>
                            </div>

                            <h3 class="mb-2">Address Information</h3>

                            @if ($userAddress->address_line_1 == null || $userAddress->address_line_2 == null || $userAddress->city == null || $userAddress->post_code == null || $userAddress->country == null)
                            <div class="alert alert-warning" role="alert">
                                You have not set up your address information yet. Please click "User Address" on the left to set up your address information.
                            </div>
                            @else
                            <label for="addressLine1" class="form-label">Address Line 1</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $userAddress->address_line_1 }}" disabled readonly>
                            </div>
                            <label for="addressLine2" class="form-label">Address Line 2</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $userAddress->address_line_2 }}" disabled readonly>
                            </div>

                            <label for="userCity" class="form-label">City</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $userAddress->city }}" disabled readonly>
                            </div>

                            <label for="userPostCode" class="form-label">Post Code</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $userAddress->post_code }}" disabled readonly>
                            </div>

                            <label for="userCountry" class="form-label">Country</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $userAddress->country }}" disabled readonly>
                            </div>
                            @endif

                            <h3 class="mb-2">Payment Information</h3>
                            @if ($userPayments->card_number == null || $userPayments->card_holder_name == null || $userPayments->expiry_date == null)
                            <div class="alert alert-warning" role="alert">
                                You have not set up your payment information yet. Please click "Payment Methods" on the left to set up your payment information.
                            </div>
                            @else
                            <label for="cardHolderName" class="form-label">Card Holder Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $userPayments->card_holder_name }}" disabled readonly>
                            </div>
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="XXXX XXXX XXXX {{ substr($userPayments->card_number, -4) }}" disabled readonly>
                            </div>

                            <label for="cardExpiryDate" class="form-label">Expiry Date</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $userPayments->expiry_date }}" disabled readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- address modal -->
    <div class="modal fade" id="userAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Update Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalAddressCross"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update-address') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address_line_1" placeholder="Address Line 1" name="address_line_1" required>
                            <label for="addressLine1">Address Line 1:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address_line_2" placeholder="Address Line 2" name="address_line_2">
                            <label for="addressLine2">Address Line 2 (Optional):</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city" placeholder="City" name="city" required>
                            <label for="city">City:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="post_code" placeholder="Post Code" name="post_code" required>
                            <label for="postCode">Post Code:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="country" name="country" aria-label="Country" required>
                                <option value="">Select Country</option>
                                <option value="England">England</option>
                                <option value="Wales">Wales</option>
                                <option value="Scotland">Scotland</option>
                                <option value="Northern Ireland">Northern Ireland</option>
                            </select>
                            <label for="country">Country:</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="updateAddressFooterClose">Close</button>
                            <button type="submit" class="btn btn-primary">Update Address</button>
                        </div>
                    </form>
                    <form action="{{ url('delete-address') }}" method="post">
                        @csrf
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="deleteAddressFooterClose">Are your sure you want to delete your address?</button>
                        </div>
                    </form>
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

        var updateAddressFooterClose = document.getElementById('updateAddressFooterClose');
        var closeModalAddressCross = document.getElementById('closeModalAddressCross');
        var userAddressButton = document.getElementById('userAddressButton');

        userAddressButton.addEventListener('click', function() {
            userAddressButton.className = 'btn btn-primary';
        });

        updateAddressFooterClose.addEventListener('click', function() {
            userAddressButton.className = 'btn btn-light';
        });

        closeModalAddressCross.addEventListener('click', function() {
            userAddressButton.className = 'btn btn-light';
        });



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