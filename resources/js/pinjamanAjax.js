$(document).ready(function() {
    $('#jumlah_angsuran').on('keyup', function(event) {
        

        console.log('Field jumlah angsuran pressed!');
        // event.preventDefault();

        // // Get form data
        // var formData = new FormData(this);
        // var url = $(this).attr('action');

        // $.ajax({
        //     url: url,
        //     type: 'POST',
        //     data: formData,
        //     contentType: false,
        //     processData: false,
        //     success: function(response) {
        //         // Handle success, e.g., show a success message, redirect, etc.
        //         alert('Pinjaman created successfully!');
        //         // Optionally, redirect or reset the form
        //     },
        //     error: function(xhr) {
        //         // Handle errors, e.g., display error messages
        //         alert('Error creating pinjaman');
        //     }
        // });
    });
});
