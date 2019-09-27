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
                ->add(
                    "firstname", TextType::class, [
                        // "label" => "Firstname",
                        "class" => "firstname", 
                        "id" => "firstname",
                        "placeholder" => "enter your firstname",
                        "required" => true
                    ], ["for" => "firstname"], "div", ["class" => "form-control"])
                ->add(
                    "password", PasswordType::class, [
                        // "label" => "Password",
                        "class" => "password", 
                        "id" => "password",
                        "required" => true
                    ], ["for" => "password"], "div", ["class" => "form-control"])
                ->add("content", TextareaType::class, [
                    // "label" => "Content",
                    "class" => "content",
                    "id" => "content",
                    "rows" => 8,
                    "required" => true,
                    "placeholder" => "Enter your message"
                ], [], "div", ["class" => "form-control"])
                ->add("country", RadioType::class, [
                    // "label" => "France",
                    "id" => "france",
                    "checked" => true
                ], ["for" => "france"], "div", ["class" => "choice"])
                ->add("country", RadioType::class, [
                    // "label" => "England",
                    "id" => "england",
                ], ["for" => "england"], "div", ["class" => "choice"])
                ->add("europe", CheckboxType::class, [
                    // "label" => "Europe",
                    "id" => "europe"
                ], ["for" => "europe"], "div", ["class" => "form-control"])
                ->add("america", CheckboxType::class, [
                    // "label" => "America",
                    "id" => "america"
                ], ["for" => "america"], "div", ["class" => "form-control"])
                ->add("language", SelectType::class, [
                    // "label" => "Languages",
                    "class" => "language",
                    "id" => "language",
                    "multiple" => true
                ], ["for" => "language"], "div", ["class" => "form-control"], [
                    "php", "javascript", "java"
                ])
                ->add("upload", FileType::class, [
                    // "label" => "Select the file to send",
                    "class" => "upload",
                    "id" => "upload",
                    "multiple" => true
                ], ["for" => "upload"], "div", ["class" => "form-control"]);
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