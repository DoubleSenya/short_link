$(document).ready(function(){

    $('#submitFormBtn').click(function (event) {
        event.preventDefault();

        let form = $('.form')[0];

        let formData = new FormData(form);

        $.ajax({
            url: '/linker.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,

            success: function(res) {

                console.log(res);
            },

            error: function(err) {

            },
        });
    });

});