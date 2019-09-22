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

            $addInputText = $this->getFormBuilder()->input("Firstname", "firstname", null, $inputFirstnameAttributes);
            $this->assertEquals(
                '<label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required>',
                $addInputText
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

            $addInputText = $this->getFormBuilder()->input("Firstname", "firstname", null, $inputFirstnameAttributes, "div", $inputFirstnameSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="username"><label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required></div>', 
                $addInputText
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

            $addInputPassword = $this->getFormBuilder()->input("Password", "password", null, $inputPasswordAttributes, "div", $inputPasswordSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="username"><label for="password">Password :</label><input type="text" name="password" class="password" id="password" required></div>', 
                $addInputPassword
            );
        }



        /**
         * @test
         */
        public function testAddTextareaWithSurround() : void
        {
            $contentAttributes = [
                "class" => "content",
                "id" => "content",
                "rows" => 8,
                "required" => true
            ];

            $contentSurroundAttributes = [
                "class" => "form-control",
                "id" => "content"
            ];

            $textareaContent = $this->getFormBuilder()->textarea("Content", "content", $contentAttributes, "div", $contentSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="content"><label for="content">Content :</label><textarea name="content" class="content" id="content" rows="8" required></textarea></div>',
                $textareaContent
            );
        }



        /**
         * @test
         */
        public function testAddTextareaWithoutLabelWithSurround() : void
        {
            $contentAttributes = [
                "class" => "content",
                "id" => "content",
                "rows" => 8,
                "required" => true
            ];

            $contentSurroundAttributes = [
                "class" => "form-control",
                "id" => "content"
            ];

            $textareaContent = $this->getFormBuilder()->textarea(null, "content", $contentAttributes, "div", $contentSurroundAttributes);
            $this->assertEquals(
                '<div class="form-control" id="content"><textarea name="content" class="content" id="content" rows="8" required></textarea></div>',
                $textareaContent
            );
        }



        /**
         * @test
         */
        public function testAddRadio() : void
        {
            $radioAttributes = [
                "class" => "content",
                "checked" => true
            ];

            $radioSurroundAttributes = [
                "class" => "form-check",
            ];

            $radio = $this->getFormBuilder()->radio("England", "country", "england", $radioAttributes, "div", $radioSurroundAttributes);
                    
            $this->assertEquals(
                '<div class="form-check"><input type="radio" id="england" name="country" value="england" class="content" checked><label for="england">England :</label></div>',
                $radio
            );
        }



        /**
         * @test
         */
        public function testAddCheckbox() : void
        {
            $checkboxAttributes = [
                "class" => "content",
            ];

            $checkboxSurroundAttributes = [
                "class" => "form-check",
            ];

            $checkbox = $this->getFormBuilder()->checkbox("Europe", "europe", "europe", $checkboxAttributes, "div", $checkboxSurroundAttributes);

            $this->assertEquals(
                '<div class="form-check"><input type="checkbox" id="europe" name="europe" value="europe" class="content"><label for="europe">Europe :</label></div>',
                $checkbox
            );
        }



        /**
         * @test
         */
        public function testAddSelect() : void
        {
            $selectAttributes = [
                "class" => "langage",
                "id" => "langage"
            ];

            $selectSurroundAttributes = [
                "class" => "form-control",
            ];

            $selectOptions = ["php", "javascript", "java"];
            $select = $this->getFormBuilder()->select("Langages", "langage", $selectAttributes, $selectOptions, 2, "div", $selectSurroundAttributes);

            $this->assertEquals(
                '<div class="form-control"><label for="langage">Langages :</label><select name="langage" class="langage" id="langage"><option value="0" >php</option><option value="1" >javascript</option><option value="2" selected>java</option></select></div>',
                $select
            );
        }



        /**
         * @test
         */
        public function testAddHidden() : void
        {
            $hiddenAttributes = [
                "id" => "postId",
                "value" => 5
            ];
            $hidden = $this->getFormBuilder()->hidden("postId", $hiddenAttributes);

            $this->assertEquals('<input type="hidden" name="postId" id="postId" value="5">', $hidden);
        }
    }