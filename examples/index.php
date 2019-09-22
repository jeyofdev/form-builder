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


    // radio
    $choiceAttributes = [
        "class" => "content",
        "checked" => true
    ];
    $choiceSurroundAttributes = [
        "class" => "form-check",
    ];
    $radio = $formBuilder->radio("England", "country", "england", $choiceAttributes, "div", $choiceSurroundAttributes);

    $choiceAttributes = [
        "class" => "content",
    ];
    $choiceSurroundAttributes = [
        "class" => "form-check",
    ];
    $radio2 = $formBuilder->radio("France", "country", "france", $choiceAttributes, "div", $choiceSurroundAttributes);



    // checkbox
    $choiceAttributes = [
        "class" => "content",
    ];
    $choiceSurroundAttributes = [
        "class" => "form-check",
    ];
    $checkbox = $formBuilder->checkbox("Europe", "europe", "europe", $choiceAttributes, "div", $choiceSurroundAttributes);

    $choiceAttributes = [
        "class" => "content",
    ];
    $choiceSurroundAttributes = [
        "class" => "form-check",
    ];
    $checkbox2 = $formBuilder->checkbox("Amerique", "amerique", "amerique", $choiceAttributes, "div", $choiceSurroundAttributes);


    // select
    $selectAttributes = [
        "class" => "langage",
        "id" => "langage",
    ];
    $selectSurroundAttributes = [
        "class" => "form-control",
    ];
    $selectOptions = ["php", "javascript", "java"];
    $select = $formBuilder->select("Langages", "langage", $selectAttributes, $selectOptions, 2, "div", $selectSurroundAttributes);


    // hidden
    $hiddenAttributes = [
        "id" => "postId",
        "value" => 5
    ];
    $hidden = $formBuilder->hidden("postId", $hiddenAttributes);


    // file
    $fileAttributes = [
        "class" => "upload",
        "id" => "upload",
        "multiple" => true
    ];
    $fileSurroundAttributes = [
        "class" => "form-control",
    ];
    $file = $formBuilder->input("Select the file to send", "upload", "file", $fileAttributes, "div", $fileSurroundAttributes);
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

                <div class="row">
                    <?= $radio; ?>
                    <?= $radio2; ?>
                </div>

                <div class="row">
                    <?= $checkbox; ?>
                    <?= $checkbox2; ?>
                </div>

                <?= $select; ?>
                <?= $hidden; ?>
                <?= $file; ?>

                <div>
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            <?= $formEnd; ?>
        </div>
    </body>
</html>