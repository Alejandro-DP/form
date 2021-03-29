<?php
include 'data.php';

$name = $_POST['name'];
$email = $_POST['email'];
$package = $_POST['package'];
$movie = $_POST['movie'];
$price = $_POST['price'];

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

/* Send Data Email */
$tittle    = "Titulo";
$mesaje   = "Nuevo registro";
$headers = "From: d2c_crew@hotmail.com" . "\r\n";
$headers =    "Reply-To: d2c_crew@hotmail.com" . "\r\n";
$headers = "X-Mailer: PHP/" . phpversion();
$to = "d2c_crew@hotmail.com";
$mail = @mail($to, $mesaje, $headers);
if ($mail) {
    echo json_encode($json_data);
}
