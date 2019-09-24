<?php
    namespace App\Form\Builder\Form_complex\Form;


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
         * {@inheritdoc}
         */
        public function generateForm () : string
        {
            $this
                ->add(
                    "firstname", TextType::class, [
                        "label" => "Firstname",
                        "class" => "firstname", 
                        "id" => "firstname",
                        "required" => false,
                        "placeholder" => "enter your firstname"
                    ], ["for" => "firstname"], "div", ["class" => "form-control"])
                ->add(
                    "password", PasswordType::class, [
                        "label" => "Password",
                        "class" => "password", 
                        "id" => "password",
                        "required" => false
                    ], ["for" => "password"], "div", ["class" => "form-control"])
                ->add("content", TextareaType::class, [
                    "label" => "Content",
                    "class" => "content",
                    "id" => "content",
                    "rows" => 8,
                    "required" => true,
                    "placeholder" => "Enter your message"
                ], [], "div", ["class" => "form-control"])
                ->add("country", RadioType::class, [
                    "label" => "France",
                    "id" => "france",
                    "checked" => true
                ], ["for" => "france"], "div", ["class" => "choice"])
                ->add("country", RadioType::class, [
                    "label" => "England",
                    "id" => "england",
                ], ["for" => "england"], "div", ["class" => "choice"])
                ->add("europe", CheckboxType::class, [
                    "label" => "Europe",
                    "id" => "europe"
                ], ["for" => "europe"], "div", ["class" => "form-control"])
                ->add("america", CheckboxType::class, [
                    "label" => "America",
                    "id" => "america"
                ], ["for" => "america"], "div", ["class" => "form-control"])
                ->add("language", SelectType::class, [
                    "label" => "Languages",
                    "class" => "language",
                    "id" => "language"
                ], ["for" => "language"], "div", ["class" => "form-control"], [
                    "php", "javascript", "java"
                ])
                ->add("postId", HiddenType::class, ["id" => 5])
                ->add("upload", FileType::class, [
                    "label" => "Select the file to send",
                    "class" => "upload",
                    "id" => "upload",
                    "multiple" => true
                ], ["for" => "upload"], "div", ["class" => "form-control"]);
                

            $formAttr = ["action" => "index", "method" => "post"];
            $this->form = $this->buildForm($formAttr, $this->fields);

            return $this->form;
        }
    }