<?php

    namespace App\Form\Builder\Form_complex\Controller;


    use App\Form\Builder\Form_complex\Model\Post;


    class PostController
    {
        public function new()
        {
            $post = new Post();
            $post
                ->setId(1)
                ->setTitle('Write a blog post')
                ->setContent('mon post de test');

            

            return $post;
        }
    }