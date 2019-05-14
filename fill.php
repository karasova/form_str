<?php 
    error_reporting(0);
    $errors = [];

    $filename = 'data.txt'; 

    if (!empty($_POST)){
        if (empty($_POST['check'])){
            $check = 'off';
        }
        else 
            $check = $_POST['check'];

        if (!empty($_POST['lastname'])){
            $lastname = $_POST['lastname'];
            $lastname = str_replace("|", "", $lastname);
        }
        else 
            $errors ['lastname'] = 'Не заполнено поле с фамилией!';

        if (!empty($_POST['firstname'])){
            $firstname = $_POST['firstname'];
            $firstname = str_replace("|", "", $firstname);
        }
        else 
            $errors ['firstname'] = 'Не заполнено поле с именем!';

        if (!empty($_POST['email'])){
            $email = $_POST['email'];
            $email = str_replace("|", "", $email);
        }
        else 
            $errors ['email'] = 'Не введен адрес электронной почты!';
    

        if (!empty($_POST['phone'])){
            $phone = $_POST['phone'];
            $phone = str_replace("|", "", $phone);
        }
        else 
            $errors ['phone'] = 'Не введен номер телефона!';


        if (empty($errors)){
            $contents = $lastname . " | " . $firstname . " | " . $email . " | " . $phone . " | " . $_POST['theme'] . " | " . $_POST['pay'] . " | " . $check . " | ". date('Y-m-d-H-i-s') . " | ".$_SERVER['REMOTE_ADDR'] ." | ". "active" . "\n";
            file_put_contents('form_str/data.txt', $contents, FILE_APPEND);  
            header('Location: form_str\success.php');
            exit;
    
        }   
        
    } 
    
    
    