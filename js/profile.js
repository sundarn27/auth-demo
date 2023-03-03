$("#profileForm").submit(function(e) {
    e.preventDefault();
    console.log("profile update")
    var name = $("#name").val();
    var age = $("#age").val();
    var dob = $("#dob").val();
    var contact = $("#contact").val();
    $.ajax({
        url: "./php/update_profile.php",
        type: "POST",
        data: {
            name: name,
            age: age,
            dob: dob,
            contact: contact
        },
        success: function(data) {
            if (data == "success") {
                console.log("success")
                // Swal.fire({
                //     icon: 'success',
                //     title: 'Profile updated successfully!',
                // })
            } else {
                console.log("data", data)
                // Swal.fire({
                //     icon: 'error',
                //     title: 'Oops...',
                //     text: 'Something went wrong!',
                // })
            }
        }
    });
});