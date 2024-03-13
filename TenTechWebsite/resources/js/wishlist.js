

$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });

    $('.remove-wishlist-item').click(function (e) {
        
        e.preventDefault();
        
        var prod_id = $(this).closest('.row').find('.prod_id').val();
        
        $.ajax({
            method: "POST",
            url: 'delete-wishlist-item',
            data: {
                'product_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                swal.fire("",response.status,"success");
            },
        });
    });

});



