<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */

include_once('../../../wp-load.php');

// an email address that will be in the From field of the email.
$from = get_option('contact_form_email');

// an email address that will receive the email with the output of the form
$sendTo = get_option('contact_form_email');

// subject of the email
$subject = 'Kontaktformular';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Vorname', 'surname' => 'Name', 'phone' => 'Telefon', 'email' => 'Email', 'message' => 'Nachricht'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Ihre Nachricht wurde erfolgreich übermittelt. Ich werde Sie sobald wie möglich kontaktieren!';

// If something goes wrong, we will display this message.
$errorMessage = 'Ups, da hat etwas nicht funktioniert. Bitte versuche es später erneut oder schreibe mir direkt eine Nachricht an: mail@crosscreations.de';


// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => get_option('captcha_secret_key'),           
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        
            echo $responseArray['message'];
    } else {
        
        try
        {
        
            if(count($_POST) == 0) throw new \Exception('Form is empty');
                    
            $emailText = "Sie haben eine neue Nachricht über das Kontaktformular von movinapes.com erhalten\n____________________\n";
        
            foreach ($_POST as $key => $value) {
                // If the field exists in the $fields array, include it in the email 
                if (isset($fields[$key])) {
                    $emailText .= "$fields[$key]: $value\n";
                }
            }
        
            // All the neccessary headers for the email.
            $headers = array('Content-Type: text/plain; charset="UTF-8";',
                'From: ' . $from,
                'Reply-To: ' . $from,
                'Return-Path: ' . $from,
            );
            
                   
            // Send email
            mail($sendTo, $subject, $emailText, implode("\n", $headers));
                
            $responseArray = array('type' => 'success', 'message' => $okMessage);
        }
        catch (\Exception $e)
        {
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
        }
        
        
        // if requested by AJAX request return JSON response
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $encoded = json_encode($responseArray);
        
            header('Content-Type: application/json');
        
            echo $encoded;
        }
        // else just display the message
        else {
            $encoded = json_encode($responseArray);
        
            header('Content-Type: application/json');
        
            echo $encoded;        }
    }
?>