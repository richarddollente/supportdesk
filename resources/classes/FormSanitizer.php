<?php
class FormSanitizer{

    public static function sanitizeFormUserEmail($inputText){

        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;

    }
    public static function sanitizeFormUserPassword($inputText){

        $inputText = strip_tags($inputText);
        return $inputText;

    }

    public static function sanitizeFormUserType($inputText){

        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
        
    }

}
?>