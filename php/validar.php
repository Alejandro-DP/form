<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
include 'data.php';

$name = $_POST['name'];
$email = $_POST['email'];
$package = $_POST['package'];
$movie = $_POST['movie'];
$price = $_POST['price'];

try {
    /* Validar campos */

    if (empty($name) || empty($email) || empty($package) || empty($movie) || empty($price)) {
        echo json_encode('Error, datos incompletos');
        return;
    }

    /* Logic of price*/
    switch ($package) {
        case 'a':
            $_price = (int)$price + 15;
            break;
        case 'b':
            $_price = (int)$price + 30;
            break;
        case 'c':
            $_price = (int)$price + 45;
            break;
    }

    // Read Json
    $data_json = file_get_contents('../save.json');
    $json_data = json_decode($data_json, true);

    if (sizeof($json_data) > 0) {
        array_push($json_data, new Data($name, $email, $package, $movie, $_price));
    } else {
        $json_data = array(new Data($name, $email, $package, $movie, $_price));
    }

    //Put or create JSON
    $json_string = json_encode($json_data);
    $file = '../save.json';
    file_put_contents($file, $json_string);

    // Send Data Email
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 2;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('', 'Name or text');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo registro';
    $mail->Body    = 'Se agrego un nuevo registro a el archivo <b>save.json</b>';

    $mail->send();
    echo json_encode(true);
} catch (Exception $e) {
    echo json_encode(false);
}
