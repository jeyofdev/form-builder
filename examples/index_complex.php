<?php

use App\Form\Builder\Form_complex\Controller\PostController;
use App\Form\Builder\Form_complex\Form\PostForm;
use App\Form\Builder\Form_complex\FormBuilder;
use App\Form\Builder\Form_complex\Type\TextType;

// Autoloade
    require dirname(__DIR__) . '/vendor/autoload.php';

    // $datas = (new PostController())->new();
    // dump($datas);

    // $formBuilder = new FormBuilder($datas);
    // $formAttr = [
    //     "action" => "index",
    //     "method" => "post"
    // ];
    // $form = $formBuilder->createFormBuilder($formAttr);
    // $form = $formBuilder->add("task", TextType::class, [
    //     "id" => "firstname",
    //     "class" => "form-control",
    // ]);

    // $_POST["postId"] = 5;
    $form = (new PostForm())->generateForm($_POST);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form builder</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="container">
            <?= $form; ?>
        </div>
    </body>
</html>