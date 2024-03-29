<!DOCTYPE html>
<html lang="en">
<head>
    
</head>

<body>

    @section('wishlist_alerts')

    <!-- WishList Alerts -->
        @if(session('success_wishlist'))
        <script>
            Toast = Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.resumeTimer;
                toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success_wishlist') }}",
            });
        </script>
        @endif
        @if(session('wishlist_error'))
        <script>
            Toast = Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            timer: 1500,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.resumeTimer;
                toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "warning",
                title: "{{ session('wishlist_error') }}",
            });
        </script>
        @endif

        @if(session('wishlist_login_error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('wishlist_login_error') }}",
                showConfirmButton: true,
            });
        </script>
        @endif
    @show

    @section('rating_alerts')
    
        <!-- Rating Alerts -->
        <!-- Success -->
        @if(session('status'))
        <script>
            Swal.fire({
                text: "{{ session('status') }}",
            });
        </script>
        @endif
        <!-- Errors -->
    
        @if(session('Ratings_Error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('Ratings_Error') }}",
            });
        </script>
        @endif
    
    @show
   
</body>
</html>