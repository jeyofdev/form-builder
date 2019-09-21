<?php

    use App\Form\Builder\FormBuilder;


    // Autoloader
    require dirname(__DIR__) . '/vendor/autoload.php';


    // Initialize the form builder
    $formBuilder = new FormBuilder();


    // the form tag
    $formStart = $formBuilder->formStart("index.php", "GET");
    $formEnd = $formBuilder->formEnd();


    // input type text
    $inputFirstnameAttributes = [
        "class" => "firstname",
        "id" => "firstname",
        "required" => true
    ];
    $inputFirstnameSurroundAttributes = [
        "class" => "form-control",
        "id" => "username"
    ];
    $inputFirstname = $formBuilder->input("Firstname", "firstname", null, $inputFirstnameAttributes, "div", $inputFirstnameSurroundAttributes);


    // input type password
    $inputPasswordAttributes = [
        "class" => "password",
        "id" => "password",
        "required" => true
    ];
    $inputPasswordSurroundAttributes = [
        "class" => "form-control",
        "id" => "password"
    ];
    $inputPassword = $formBuilder->input("Password", "password", "password", $inputPasswordAttributes, "div", $inputPasswordSurroundAttributes);


    // textarea
    $contentAttributes = [
        "class" => "content",
        "id" => "content",
        "rows" => 8,
        "required" => true
    ];
    $contentSurroundAttributes = [
        "class" => "form-control",
        "id" => "content"
    ];
    $content = $formBuilder->textarea(null, "content", $contentAttributes, "div", $contentSurroundAttributes);
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
            <!-- form -->
            <?= $formStart; ?>
                <?= $inputFirstname; ?>
                <?= $inputPassword; ?>
                <?= $content; ?>

                <div>
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            <?= $formEnd; ?>
        </div>
    </body>
</html>