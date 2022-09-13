<?php
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $website = htmlspecialchars($_POST['website']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($email) && !empty($message)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $receiver = "receiver_email_address"; //enter that email address where you want to receive all messages
            $subject = "From: $name <$email>"
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite\n\nMessage:\n$message\n\nRegards,\n$name";
            $sender = "From: $email";
            if(mail($receiver, $subject, $body, $sender)){
                echo"your message has been sent";
            }
            else{
                echo"sorry faild to send your message!";
            }
        }else{
            echo"enter a valid email address!";
        }
    }else{
        echo"email and message field is required!";
    }
?>