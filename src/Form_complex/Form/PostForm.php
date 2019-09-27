<?php
    namespace App\Form\Builder\Form_complex\Form;

    use App\Form\Builder\Form_complex\FormFactory;
    use App\Form\Builder\Form_complex\Type\CheckboxType;
    use App\Form\Builder\Form_complex\Type\FileType;
    use App\Form\Builder\Form_complex\Type\HiddenType;
    use App\Form\Builder\Form_complex\Type\PasswordType;
    use App\Form\Builder\Form_complex\Type\RadioType;
    use App\Form\Builder\Form_complex\Type\SelectType;
    use App\Form\Builder\Form_complex\Type\TextareaType;
    use App\Form\Builder\Form_complex\Type\TextType;


    class PostForm extends AbstractForm
    {
        /**
         * @var FormType
         */
        private $formType;



        public function __construct ()
        {
            $this->formOption = FormFactory::createFormType();
        }



        /**
         * {@inheritdoc}
         */
        public function generateForm () : string
        {
            $this
                ->add("postId", HiddenType::class, ["id" => 5])
                ->add("firstname", TextType::class, [
                    "label" => "Firstname",
                    "label_attr" => [
                        "for" => "firstname",
                        "class" => "label_firstname"
                    ],
                    "class" => "firstname",
                    "id" => "firstname",
                    "placeholder" => "enter your firstname",
                    "required" => true
                ], "div", ["class" => "form-control"])
                ->add("password", PasswordType::class, [
                    "label" => "Password",
                    "label_attr" => [
                        "for" => "password",
                        "class" => "label_password"
                    ],
                    "class" => "password", 
                    "id" => "password",
                    "required" => true
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
                    "placeholder" => "Enter your message"
                ], "div", ["class" => "form-control"])
                ->add("country", RadioType::class, [
                    "label" => "France",
                    "label_attr" => [
                        "for" => "france"
                    ],
                    "id" => "france",
                    "checked" => true
                ], "div", ["class" => "choice"])
                ->add("country", RadioType::class, [
                    "label" => "England",
                    "label_attr" => [
                        "for" => "england"
                    ],
                    "id" => "england",
                ], "div", ["class" => "choice"])
                ->add("europe", CheckboxType::class, [
                    "label" => "Europe",
                    "label_attr" => [
                        "for" => "europe"
                    ],
                    "id" => "europe"
                ], "div", ["class" => "form-control"])
                ->add("america", CheckboxType::class, [
                    "label" => "America",
                    "label_attr" => [
                        "for" => "america"
                    ],
                    "id" => "america"
                ], "div", ["class" => "form-control"])
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
                ], "div", ["class" => "form-control"]);
                ;
                

            $this->form = $this->buildForm($this->formOption, $this->fields, [
                "action" => "index", 
                "method" => "post",
                "id" => "form-post",
                "class" => "form"
            ]);

            return $this->form;
        }
    }