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
            $fieldAttributes = [
                "class" => "firstname",
                "id" => "firstname",
                "required" => true
            ];
            $field = $this->getFormBuilder()->input("Firstname", "firstname", null, $fieldAttributes);

            $this->assertEquals(
                '<label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required>',
                $field
            );
        }



        public function testAddInputTextWithoutLabel() : void
        {
            $fieldAttributes = [
                "class" => "firstname",
                "id" => "firstname",
                "required" => true
            ];
            $field = $this->getFormBuilder()->input(null, "firstname", null, $fieldAttributes);

            $this->assertEquals(
                '<input type="text" name="firstname" class="firstname" id="firstname" required>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddInputTextWithSurround() : void
        {
            $fieldAttributes = [
                "class" => "firstname",
                "id" => "firstname",
                "required" => true
            ];
            $field = $this->getFormBuilder()->input("Firstname", "firstname", null, $fieldAttributes);
            $fieldWithsurround = $this->getFormBuilder()->row("div", ["class" => "form-control", "id" => "username"], $field);

            $this->assertEquals(
                '<div class="form-control" id="username"><label for="firstname">Firstname :</label><input type="text" name="firstname" class="firstname" id="firstname" required></div>', 
                $fieldWithsurround
            );
        }



        /**
         * @test
         */
        public function testAddInputPassword() : void
        {
            $fieldAttributes = [
                "class" => "password",
                "id" => "password",
                "required" => true
            ];
            $field = $this->getFormBuilder()->input("Password", "password", null, $fieldAttributes);

            $this->assertEquals(
                '<label for="password">Password :</label><input type="text" name="password" class="password" id="password" required>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddInputFile() : void
        {
            $fieldAttributes = [
                "class" => "upload",
                "id" => "upload",
                "multiple" => true
            ];
            $field = $this->getFormBuilder()->file("Select the file to send", "upload", $fieldAttributes);

            $this->assertEquals(
                '<label for="upload">Select the file to send :</label><input type="file" name="upload" class="upload" id="upload" multiple>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddTextareaWithSurround() : void
        {
            $fieldAttributes = [
                "class" => "content",
                "id" => "content",
                "rows" => 8,
                "required" => true
            ];
            $field = $this->getFormBuilder()->textarea("Content", "content", $fieldAttributes);

            $this->assertEquals(
                '<label for="content">Content :</label><textarea name="content" class="content" id="content" rows="8" required></textarea>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddTextarea() : void
        {
            $fieldAttributes = [
                "class" => "content",
                "id" => "content",
                "rows" => 8,
                "required" => true
            ];

            $field = $this->getFormBuilder()->textarea(null, "content", $fieldAttributes);
            $this->assertEquals(
                '<textarea name="content" class="content" id="content" rows="8" required></textarea>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddRadio() : void
        {
            $fieldAttributes = [
                "class" => "content",
                "checked" => true
            ];
            $field = $this->getFormBuilder()->radio("England", "country", "england", $fieldAttributes);

            $this->assertEquals(
                '<input type="radio" id="england" name="country" value="england" class="content" checked><label for="england">England :</label>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddCheckbox() : void
        {
            $fieldAttributes = [
                "class" => "content",
            ];

            $field = $this->getFormBuilder()->checkbox("Europe", "europe", "europe", $fieldAttributes);

            $this->assertEquals(
                '<input type="checkbox" id="europe" name="europe" value="europe" class="content"><label for="europe">Europe :</label>',
                $field
            );
        }



        /**
         * @test
         */
        public function testAddSelect() : void
        {
            $fieldAttributes = [
                "class" => "langage",
                "id" => "langage"
            ];
            $fieldOptions = ["php", "javascript", "java"];
            $field = $this->getFormBuilder()->select("Langages", "langage", $fieldAttributes, $fieldOptions, 2);

            $this->assertEquals(
                '<label for="langage">Langages :</label><select name="langage" class="langage" id="langage"><option value="0" >php</option><option value="1" >javascript</option><option value="2" selected>java</option></select>',
                $field
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



        /**
         * @test
         */
        public function testAddButtonSubmit() : void
        {
            $buttonAttributes = ["class" => "btn"];
            $button = $this->getFormBuilder()->submit("Submit", $buttonAttributes);

            $this->assertEquals('<button type="submit" class="btn">Submit</button>', $button);
        }



        /**
         * @test
         */
        public function testAddButtonReset() : void
        {
            $buttonAttributes = ["class" => "btn"];
            $button = $this->getFormBuilder()->reset("Reset", $buttonAttributes);

            $this->assertEquals('<button type="reset" class="btn">Reset</button>', $button);
        }
    }