<?php

    namespace App\Form\Builder\Controller;


    use App\Form\Builder\Form\PostForm;
    use App\Form\Builder\Model\Post;


    class PostController
    {
        /**
         * The opening tag of the form
         *
         * @var string
         */
        private $start;



        /**
         * The fields of the form
         *
         * @var array
         */
        private $fields;


        /**
         * The buttons of the form
         *
         * @var string
         */
        private $buttons;



        /**
         * The closing tag of the form
         *
         * @var string
         */
        private $end;



        // public function new()
        // {
        //     $post = new Post();
        //     $post
        //         ->setId(1)
        //         ->setTitle('Write a blog post')
        //         ->setContent('mon post de test');

        //     return $post;
        // }



        /**
         * Set the form
         *
         * @param PostForm $postForm
         * @return self
         */
        public function setForm (PostForm $postForm) : self
        {
            $postForm->generateForm($_POST)->setView();

            $this->start = $postForm->setFormStart()->getFormStart();
            $this->fields = $postForm->setFormFields()->getFormFields();
            $this->buttons = $postForm->setFormButtons()->getFormButtons();
            $this->end = $postForm->setFormEnd()->getFormEnd();

            return $this;
        }



        /**
         * Get the opening tag of the form
         *
         * @return string
         */
        public function getStart () : ?string
        {
            return $this->start;
        }



        /**
         * Get the fields of the form
         *
         * @return array
         */
        public function getFields() : array
        {
            return $this->fields;
        }



        /**
         * Get the buttons of the form
         *
         * @return string
         */
        public function getButtons () : string
        {
            return $this->buttons;
        }



        /**
         * Get the closing tag of the form
         *
         * @return string
         */
        public function getEnd () : string
        {
            return $this->end;
        }
    }