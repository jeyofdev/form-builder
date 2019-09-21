<?php

    use App\Form\Builder\FormBuilder;


    // Autoloader
    require dirname(__DIR__) . '/vendor/autoload.php';


    // Initialize the form builder
    $formBuilder = new FormBuilder();


    // the form tag
    $formStart = $formBuilder->FormStart("index.php", "GET");
    $formEnd = $formBuilder->FormEnd();
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
                <div>
                    <label for="firstname">Firstname:</label>
                    <input type="text" id="firstname" name="firstname">
                </div>

                <div>
                    <label for="lastname">Lastname:</label>
                    <input type="text" id="lastname" name="lastname">
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>

                <div>
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" name="password" rows="5"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            <?= $formEnd; ?>
        </div>
    </body>
</html>