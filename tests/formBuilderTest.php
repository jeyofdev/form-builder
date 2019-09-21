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



        /**
         * @test
         */
        public function testAddInputText() : void
        {
            $inputFirstnameAttributes = [
                "class" => "firstname",
                "id" => "firstname",
                "required" => true
            ];

            $formEnd = $this->getFormBuilder()->input("Firstname", "firstname", null, $inputFirstnameAttributes);
            $this->assertEquals(
                '<label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required>',
                $formEnd
            );
        }



        /**
         * @test
         */
        public function testAddInputTextWithSurround() : void
        {
            $inputFirstnameAttributes = [
                "class" => "firstname",
                "id" => "firstname",
                "required" => true
            ];

            $inputFirstnameSurroundAttributes = [
                "class" => "form-control",
                "id" => "username"
            ];

            $formEnd = $this->getFormBuilder()->input("Firstname", "firstname", null, $inputFirstnameAttributes, "div", $inputFirstnameSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="username"><label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required></div>', 
                $formEnd
            );
        }



        /**
         * @test
         */
        public function testAddInputPasswordWithSurround() : void
        {
            $inputPasswordAttributes = [
                "class" => "password",
                "id" => "password",
                "required" => true
            ];

            $inputPasswordSurroundAttributes = [
                "class" => "form-control",
                "id" => "username"
            ];

            $formEnd = $this->getFormBuilder()->input("Password", "password", null, $inputPasswordAttributes, "div", $inputPasswordSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="username"><label for="password">Password :</label><input type="text" name="password" class="password" id="password" required></div>', 
                $formEnd
            );
        }
    }