<?php

    use App\Form\Builder\Form_complex\Controller\PostController;
    use App\Form\Builder\Form_complex\Form\PostForm;


    // Autoloader
    require dirname(__DIR__) . '/vendor/autoload.php';

    $_POST["postId"] = 5;

    $postForm = new PostForm();
    $post = new PostController();
    $post->setForm($postForm);

    $fields = $post->getFields();
    extract($fields);
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
            <?= $post->getStart(); ?>
                <?= $firstname; ?>
                <?= $password; ?>
                <?= $content; ?>
                <?= $postForm->row("div", ["class" => "row", "id" => "country"], $countryFrance, $countryEngland); ?>
                <?= $postForm->row("div", ["class" => "row", "id" => "continent"], $europe, $america); ?>
                <?= $postForm->row("div", ["class" => "row"], $post->getButtons()); ?>
            <?= $post->getEnd(); ?>
        </div>
    </body>
</html>