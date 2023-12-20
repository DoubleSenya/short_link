<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Сокращаем ссылки</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body class="body">
        <div class="content">
            <form class="form">
                <input class="input-link" type="text" name="link" placeholder="Введите ссылку" require/>
                <button class="submit" type="button" id="submitFormBtn">Получить</button>
            </form>
            
            <div class="result">
                <div class="label">Ваша ссылка:</div>
                <div class="result-url" id="resultUrl"></div>
            </div>
        </div>
    </body>

    <script src="js/app.js"></script>
</html>