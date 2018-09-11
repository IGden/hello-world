<?php

class SiteController
{
    public static function actionIndex(){

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public static function actionAbout(){

        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    public static function actionMail(){

        $result = false;
        
        if(isset($_POST['submit'])){
            
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userPhone = $_POST['phone'];
            $userMessage = $_POST['message'];
            
            $errors = false;
            
            // Validation
            if(!User::checkEmail($userEmail)){
                $errors[] = 'Enter correct Email';
            }
            
            if($errors == false){
                
                $adminEmail = 'admin@mail.com';
                $message = "Message: {$userMessage}. From: {$userName}, {$userEmail}. Phone: {$userPhone}";
                $subject = 'User mail';
                
                //$result = mail($adminEmail, $subject, $message);
                $result = true; // TODO redo
            }
        }

        require_once(ROOT . '/views/site/mail.php');
        return true;
    }

    public static function actionFAQ(){

        $faq = array();
        $faq = include(ROOT . '/config/faq.php');
        
        require_once(ROOT . '/views/site/faq.php');
        return true;
    }
}