<?php

    require __DIR__.'/vendor/autoload.php';
    require_once  __DIR__.'/functions/facades.php';

    spl_autoload_register(function ($file) {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/classes/' . str_replace("\\", "/", $file) . '.php';

        if(file_exists($file))
        {
            require_once $file;
        }
    });


    use Services\LinkerService;
    use Validators\UrlValidator;

    $originalLink = htmlspecialchars($_POST['link']);

    $validator = new UrlValidator($originalLink);

    if(!$validator->check())
    {
        echo json_encode([
            'success' => false,
            'code' => 1,
        ]);

        return;
    }

    $service = new LinkerService();
    $result = $service->handle($originalLink);

    echo json_encode(([
        'success' => true,
        'result' => 'http://' . $_SERVER['HTTP_HOST'] . '/' . $result,
    ]));