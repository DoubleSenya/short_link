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

                response = JSON.parse(res);

                $('#resultBlock').css('display', 'block');
                if (!response.success)
                {
                    switch (response.code)
                    {
                        case 1:
                            $('#resultUrl').text('Некорректно введен url');
                            break;
                        default:
                            $('#resultUrl').text('Неизвестная ошибка');
                            break;
                    }

                    return;
                }

                $('#resultUrl').text(response.result);
            },

            error: function(err) {
                $('#resultBlock').css('display', 'block');
                $('#resultUrl').text('Некорректно введен url');
            },
        });
    });

});