<?php

    namespace App\Form\Builder\Form;


    use App\Form\Builder\FormFactory;
    use App\Form\Builder\Type\CheckboxType;
    use App\Form\Builder\Type\FileType;
    use App\Form\Builder\Type\HiddenType;
    use App\Form\Builder\Type\PasswordType;
    use App\Form\Builder\Type\RadioType;
    use App\Form\Builder\Type\SelectType;
    use App\Form\Builder\Type\TextareaType;
    use App\Form\Builder\Type\TextType;


    class PostForm extends AbstractForm
    {
        public function __construct ()
        {
            $this->formOption = FormFactory::createFormType();
        }



        /**
         * {@inheritdoc}
         */
        public function generateForm (array $datas = []) : self
        {
            parent::generateForm($datas);

            $this
                ->add("postId", HiddenType::class, ["value" => $this->getValue($datas, "postId")])
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
                ->submit("Submit the form", [
                    "class" => "btn btn-primary",
                    "id" => "submit-button"
                ])
                ->reset("empty the form", [
                    "class" => "btn btn-danger",
                    "id" => "reset-button"
                ]);

            $this->form = $this->buildForm($this->formOption, [
                "action" => "#", 
                "method" => "post",
                "id" => "form-post",
                "class" => "form"
            ]);

            $this->setView();

            return $this;
        }
    }