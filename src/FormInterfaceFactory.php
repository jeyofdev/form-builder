<?php

    namespace App\Form\Builder;


    use App\Form\Builder\Options\FormOption;
    use App\Form\Builder\Type\FormType;


    interface FormInterfaceFactory
    {
        /**
         * @return FormType
         */
        public static function createFormType ();



        /**
         * @return FormOption
         */
        public static function createFormOption ();
    }

