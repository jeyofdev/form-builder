# A simple class to generate a form

<a name="index_block"></a>

* [1. Create a form](#block1)
    * [1.1.  Create an empty form](#block1.1)
    * [1.2.  Define the fields of the form](#block1.2)

* [2. View the form](#block2)
    * [2.1. Initialize the Form Builder](#block2.1)
    * [2.2. Generate the form tag](#block2.2)
    * [2.3. Generate the fields](#block2.3)
    * [2.4. Generate the fields with surround](#block2.4)
    * [2.5. Generate the buttons](#block2.5)


<a name="block1"></a>
## 1. Create a form [↑](#index_block) 

<a name="block1.1"></a>
### 1.1. Create an empty form [↑](#index_block) 

```php
<?php
    namespace App\Form\Builder\Form;

    use App\Form\Builder\FormFactory;


    class PostForm extends AbstractForm
    {
        public function __construct ()
        {
            $this->formOption = FormFactory::createFormType();
        }


        public function generateForm (array $datas = []) : self
        {
            parent::generateForm($datas);

            // define here the fields of the form

            $this->form = $this->buildForm($this->formOption, [
                "action" => "#", 
                "method" => "post"
                "class" => "form"
            ]);

            $this->setView();

            return $this;
        }
    }
```


<a name="block1.2"></a>
### 1.2 Define the fields of the form [↑](#index_block) 

The add() method is used to add a field to the form.

The method takes in parameters :
* the name attribute of the fields (string)
* the type of the field (TextType :: class, PasswordType :: class, RadioType, CheckboxType ...)
* the attributes of the field (array)
* the html element that surrounds the field (string - optional)
* the attributes of the element that surrounds the field (array - optional)
* the options of the select field (array - only for select fields)

The submit() and reset() methods are used to add a submit and reset button, respectively.
These methods take 2 parameters:
* the field label
* the attributes of the fields (array)

```php
<?php
    namespace App\Form\Builder\Form;

    use App\Form\Builder\FormFactory;


    class PostForm extends AbstractForm
    {
        ...

        public function generateForm (array $datas = []) : self
        {
            parent::generateForm($datas);

            $this
                // input type text
                ->add("firstname", TextType::class, [
                    "label" => "Firstname",
                    "label_attr" => [
                        "for" => "firstname",
                        "class" => "label_firstname"
                    ],
                    "class" => "firstname",
                    "id" => "firstname",
                    "placeholder" => "enter your firstname",
                    "required" => true,
                    "value" => $this->getValue($datas, "firstname")
                ], "div", ["class" => "form-control"])
                
                // input type password
                ->add("password", PasswordType::class, [
                    "label" => "Password",
                    "label_attr" => [
                        "for" => "password",
                        "class" => "label_password"
                    ],
                    "class" => "password", 
                    "id" => "password",
                    "required" => true,
                ], "div", ["class" => "form-control"])

                // input type file
                ->add("upload", FileType::class, [
                    "label" => "Select the file to send",
                    "label_attr" => [
                        "for" => "upload",
                        "class" => "label_upload"
                    ],
                    "class" => "upload",
                    "id" => "upload",
                    "multiple" => true
                ], "div", ["class" => "form-control"])

                // input type radio
                ->add("country", RadioType::class, [
                    "label" => "France",
                    "label_attr" => [
                        "for" => "france"
                    ],
                    "id" => "france",
                    "value" => "france"
                ], "div", ["class" => "choice"])
                ->add("country", RadioType::class, [
                    "label" => "England",
                    "label_attr" => [
                        "for" => "england"
                    ],
                    "id" => "england",
                    "checked" => true,
                    "value" => "england"
                ], "div", ["class" => "choice"])

                // input type checkbox
                ->add("europe", CheckboxType::class, [
                    "label" => "Europe",
                    "label_attr" => [
                        "for" => "europe"
                    ],
                    "id" => "europe",
                    "value" => "europe"
                ], "span", ["class" => "form-control"])
                ->add("america", CheckboxType::class, [
                    "label" => "America",
                    "label_attr" => [
                        "for" => "america"
                    ],
                    "id" => "america",
                    "value" => "america"
                ], "span", ["class" => "form-control"])

                // textarea
                ->add("content", TextareaType::class, [
                    "label" => "Content",
                    "label_attr" => [
                        "for" => "content",
                        "class" => "label_content"
                    ],
                    "class" => "content",
                    "id" => "content",
                    "rows" => 8,
                    "required" => true,
                    "autofocus" => true,
                    "value" => $this->getValue($datas, "content"),
                    "placeholder" => "Enter your message"
                ], "div", ["class" => "form-control"])

                // select
                ->add("language", SelectType::class, [
                    "label" => "Languages",
                    "label_attr" => [
                        "for" => "languages",
                        "class" => "label_languages"
                    ],
                    "class" => "language",
                    "id" => "language"
                ], "div", ["class" => "form-control"], [
                    "php", "javascript", "java"
                ])

                // button type submit
                ->submit("Submit the form", [
                    "class" => "btn btn-primary",
                    "id" => "submit-button"
                ])

                // button type reset
                ->reset("empty the form", [
                    "class" => "btn btn-danger",
                    "id" => "reset-button"
                ]);

            $this->form = $this->buildForm($this->formOption, [
                "action" => "#", 
                "method" => "post"
                "class" => "form"
            ]);

            $this->setView();

            return $this;
        }
    }
```


<a name="block2"></a>
## 2. View the form [↑](#index_block) 

<a name="block2.1"></a>
### 2.1. Initialize the form [↑](#index_block) 

```php
use App\Form\Builder\Controller\PostController;
use App\Form\Builder\Form\PostForm;

$postForm = new PostForm();
$post = new PostController();
$post->setForm($postForm);
```


<a name="block2.2"></a>
### 2.2. Generate the form tag [↑](#index_block) 

#### Usage:
```php
<?php
    use App\Form\Builder\Controller\PostController;
    use App\Form\Builder\Form\PostForm;

    $postForm = new PostForm();
    $post = new PostController();
    $post->setForm($postForm);
?>
```
```html
<div class="container">
    <?= $post->getStart(); ?>
    <?= $post->getEnd(); ?>
</div>
```

#### Output:
```html
<div class="container">
    <form action="#" method="post" id="form-post" class="form"></form> 
</div>
```


<a name="block2.3"></a>
### 2.3. Generate the fields [↑](#index_block) 

#### Usage:
```php
<?php
    use App\Form\Builder\Controller\PostController;
    use App\Form\Builder\Form\PostForm;

    $postForm = new PostForm();
    $post = new PostController();
    $post->setForm($postForm);

    $fields = $post->getFields();
    extract($fields);
?>
```
```html
<div class="container">
    <?= $post->getStart(); ?>
        <?= $firstname; ?>
        <?= $password; ?>
        <?= $language; ?>
        <?= $content; ?>
        <?= $countryFranced; ?>
        <?= $countryEngland; ?>
        <?= $europe; ?>
        <?= $america; ?>
    <?= $post->getEnd(); ?>
</div>
```

#### Output:
```html
<div class="container">
    <form action="#" method="post" id="form-post" class="form" novalidate="">
        <div class="form-control">
            <label for="firstname" class="label_firstname">Firstname :</label>
            <input type="text" name="firstname" class="firstname" id="firstname" placeholder="enter your firstname">
        </div>

        <div class="form-control">
            <label for="password" class="label_password">Password :</label>
            <input type="password" name="password" class="password" id="password" required>
        </div>

        <div class="form-control">
            <label for="languages" class="label_languages">Languages :</label>
            <select name="language" class="language" id="language">
                <option value="0">php</option>
                <option value="1" selected="">javascript</option>
                <option value="2">java</option>
            </select>
        </div>
        ...
    </form> 
</div>
```


<a name="block2.4"></a>
### 2.4. Generate the fields with surround [↑](#index_block) 

#### Usage:
```php
<?php
    use App\Form\Builder\Controller\PostController;
    use App\Form\Builder\Form\PostForm;

    $postForm = new PostForm();
    $post = new PostController();
    $post->setForm($postForm);

    $fields = $post->getFields();
    extract($fields);
?>
```
```html
<div class="container">
    <?= $post->getStart(); ?>
        <?= $postForm->row("div", ["class" => "row"], $firstname, $password); ?>
        <?= $content; ?>
    <?= $post->getEnd(); ?>
</div>
```

#### Output:
```html
<div class="container">
    <form action="#" method="post" id="form-post" class="form" novalidate="">
        <div class="row">
            <div class="form-control">
                <label for="firstname" class="label_firstname">Firstname :</label>
                <input type="text" name="firstname" class="firstname" id="firstname" placeholder="enter your firstname">
            </div>

            <div class="form-control">
                <label for="password" class="label_password">Password :</label>
                <input type="password" name="password" class="password" id="password" required>
            </div>
        </div>

        <div class="form-control">
            <label for="content" class="label_content">Content :</label>
            <textarea name="content" class="content" id="content" rows="8" placeholder="Enter your message" autofocus="" required=""></textarea>
        </div>
    </form> 
</div>
```


<a name="block2.5"></a>
### 2.5. Generate the buttons [↑](#index_block) 

#### Usage:
```php
<?php
    use App\Form\Builder\Controller\PostController;
    use App\Form\Builder\Form\PostForm;

    $postForm = new PostForm();
    $post = new PostController();
    $post->setForm($postForm);

    $fields = $post->getFields();
    extract($fields);
?>
```
```html
<div class="container">
    <?= $post->getStart(); ?>
        <?= $postForm->row("div", ["class" => "row"], $firstname, $password); ?>
        <?= $postForm->row("div", ["class" => "row"], $post->getButtons()); ?>
    <?= $post->getEnd(); ?>
</div>
```

#### Output:
```html
<div class="container">
    <form action="#" method="post" id="form-post" class="form" novalidate="">
        <div class="row">
            <div class="form-control">
                <label for="firstname" class="label_firstname">Firstname :</label>
                <input type="text" name="firstname" class="firstname" id="firstname" placeholder="enter your firstname">
            </div>

            <div class="form-control">
                <label for="password" class="label_password">Password :</label>
                <input type="password" name="password" class="password" id="password" required>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form> 
</div>
```