<?php

    namespace App\Form\Builder\Form_complex\Type;


    class TextType extends AbstractType
    {
        public function setTag()
        {
            return "input";
        }


        public function configureOptions()
        {
            $defaultOptions = [
                "required" => false
            ];

            return $defaultOptions;
        }
    }

