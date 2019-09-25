<?php

    namespace App\Form\Builder\Form_complex;


    use App\Form\Builder\Form_complex\Options\FormOption;
    use Symfony\Component\Form\Extension\Core\Type\FormType;


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

