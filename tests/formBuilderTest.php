<?php

    use App\Form\Builder\FormBuilder;
    use PHPUnit\Framework\TestCase;


    final class FormBuilderTest extends TestCase
    {
        public function getFormBuilder () : FormBuilder
        {
            return new FormBuilder();
        }



        /**
         * @test
         */
        public function testFormStart() : void
        {
            $formStart = $this->getFormBuilder()->FormStart("index.php", "post");
            $this->assertEquals('<form action="index.php" method="post">', $formStart);
        }



        /**
         * @test
         */
        public function testFormEnd() : void
        {
            $formEnd = $this->getFormBuilder()->FormEnd();
            $this->assertEquals("</form>", $formEnd);
        }
    }