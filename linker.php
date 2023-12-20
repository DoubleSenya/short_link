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

    use Linker\ShortLinker;
    use Models\Url;

    $originalLink = $_POST['link'];

    $linker = new ShortLinker($originalLink);
    $shortLink = $linker->make();

    $url = new Url();
    $url->setOriginal($originalLink);
    $url->setShort($shortLink);
    $isSaved = $url->save();

    if (!$isSaved)
    {
        $response = [
            'success' => false,
        ];
    }
    else
    {
        $response = [
            'success' => true,
            'result' => $shortLink,
        ];
    }

    echo json_encode($response);