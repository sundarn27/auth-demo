$("#login-form").submit(function(event) {
    console.log("logging...")
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "./php/login.php",
        data: $(this).serialize(),
        success: function(response) {
            if (response == "success") {
                // console.log("if",response)
                // Redirect to profile page on successful login
                window.location.href = "profile.html";
            } else {
                // console.log("else",response)
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid email or password!',
                })
            }
        }
    });
});