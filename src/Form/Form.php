<?php
    
    namespace App\Form\Builder\Form;


    use App\Form\Builder\Exception\FormException;


    /**
     * Manage the form tag
     */
    class Form
    {
        /**
         * The allowed values ​​for the method property of the <form> attribute
         */
        const METHODS_ALLOWED = ["post", "get"];



        /**
         * The start tag of a form
         *
         * @var string
         */
        private static $formStart;


        /**
         * The end tag of a form
         *
         * @var string
         */
        private static $formEnd = "</form>";



        /**
         * Get the start tag of a form
         *
         * @return string
         */
        public static function getFormStart () : string
        {
            return self::$formStart;
        }



        /**
         * Set the start tag of a form
         *
         * @param  string|null $action The action attribute
         * @param  string|null $method The method attribute
         * @return void
         */
        public static function setFormStart (?string $action = null, ?string $method = null) : void
        {
            $form = '<form';

            if (!is_null($action)) {
                $form .= ' action="' . strtolower($action) . '"';
            }

            if (!is_null($method)) {
                if (in_array(strtolower($method), self::METHODS_ALLOWED)) {
                    $form .= ' method="' . strtolower($method) . '"';
                } else {
                    throw new FormException("The 2nd parameter of the setForm () method is not allowed");
                }
            }

            $form .= '>';

            self::$formStart = $form;
        }



        /**
         * Get the end tag of a form
         *
         * @return string
         */
        public static function getFormEnd () : string
        {
            return self::$formEnd;
        }
    }