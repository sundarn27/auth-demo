$("#signup-form").submit(function(event) {
    console.log("logging...")
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "./php/signup.php",
        data: $(this).serialize(),
        success: function(response) {
            console.log(response)
            Swal.fire({
                title: 'Success!',
                text: 'You have successfully registered',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "login.html";
                }
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});