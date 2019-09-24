<?php

    use App\Form\Builder\FormBuilder;


    // Autoloader
    require dirname(__DIR__) . '/vendor/autoload.php';

    // $_POST["postId"] = 5;


    // Initialize the form builder
    $formBuilder = new FormBuilder($_POST);


    // the form tag
    $formStart = $formBuilder->formStart("index.php", "POST");
    $formEnd = $formBuilder->formEnd();


    // input type text
    $inputFirstnameAttributes = [
        "class" => "firstname",
        "id" => "firstname",
        "required" => true
    ];
    $inputFirstname = $formBuilder->input("Firstname", "firstname", null, $inputFirstnameAttributes);


    // input type password
    $inputPasswordAttributes = [
        "class" => "password",
        "id" => "password",
        "required" => true
    ];
    $inputPassword = $formBuilder->input("Password", "password", "password", $inputPasswordAttributes);


    // textarea
    $contentAttributes = [
        "class" => "content",
        "id" => "content",
        "rows" => 8,
        "required" => true
    ];
    $content = $formBuilder->textarea("Content", "content", $contentAttributes);


    // radio
    $choiceAttributes = [
        "class" => "content"
    ];
    $radio = $formBuilder->radio("England", "country", "england", true, $choiceAttributes, "div", ["class" => "choice"]);

    $choiceAttributes = [
        "class" => "content",
    ];
    $radio2 = $formBuilder->radio("France", "country", "france", false, $choiceAttributes, "div");



    // checkbox
    $choiceAttributes = [
        "class" => "content",
    ];
    $checkbox = $formBuilder->checkbox("Europe", "europe", "europe", $choiceAttributes, "div");

    $choiceAttributes = [
        "class" => "content",
    ];
    $checkbox2 = $formBuilder->checkbox("Amerique", "amerique", "amerique", $choiceAttributes, "div");


    // select
    $selectAttributes = [
        "class" => "language",
        "id" => "language",
    ];
    $selectOptions = ["php", "javascript", "java"];
    $select = $formBuilder->select("Languages", "language", $selectAttributes, $selectOptions, 2);


    // hidden
    $hiddenAttributes = [
        "id" => "postId"
    ];
    $hidden = $formBuilder->hidden("postId", $hiddenAttributes);


    // input type file
    $fileAttributes = [
        "class" => "upload",
        "id" => "upload",
        "multiple" => true
    ];
    $file = $formBuilder->file("Select the file to send", "upload", null, $fileAttributes);



    // submit
    $submitAttributes = [
        "class" => "btn"
    ];
    $submit = $formBuilder->submit("Submit", $submitAttributes);


    // reset
    $resetAttributes = [
        "class" => "btn"
    ];
    $reset = $formBuilder->reset("Reset", $resetAttributes);
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
                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "username"], $inputFirstname); ?>
                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "password"], $inputPassword); ?>
                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "content"], $content); ?>

                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "radio"], $radio, $radio2); ?>
                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "checkbox"], $checkbox, $checkbox2); ?>

                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "languages"], $select); ?>
                <?= $hidden; ?>

                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "upload"], $file); ?>

                <?= $formBuilder->row("div", ["class" => "form-control", "id" => "button-form"], $submit, $reset); ?>
            <?= $formEnd; ?>
        </div>
    </body>
</html>