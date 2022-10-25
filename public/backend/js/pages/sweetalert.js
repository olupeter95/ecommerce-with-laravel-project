$(document).on('click', '#delete', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            }
        });
});

$(document).on('click', '#confirm', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order have been confirmed.',
                'success'
            )
            }
        });
});

$(document).on('click', '#processing', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Process Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order have been processed.',
                'success'
            )
            }
        });
});

$(document).on('click', '#picked', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, pick Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order have been picked.',
                'success'
            )
            }
        });
});

$(document).on('click', '#shipped', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Ship Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order have been Shipped.',
                'success'
            )
            }
        });
});

$(document).on('click', '#delivered', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Deliver Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order has been delivered.',
                'success'
            )
            }
        });
});

$(document).on('click', '#cancelled', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Cancel Order!'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Confirmed!',
                'Your order has been Cancelled.',
                'success'
            )
            }
        });
});