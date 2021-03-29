<?php
include 'data.php';

$name = $_POST['name'];
$email = $_POST['email'];
$package = $_POST['package'];
$movie = $_POST['movie'];
$price = $_POST['price'];

/* Validar campos */


if ($name == "" ){

}

/* Realizar logica de  */
switch($package){
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


$data_json = file_get_contents('../save.json');
$json_data = json_decode($data_json, true);

$array_push($json_data, new Data($name,$email,$package,$movie,$_price));






 /* $arr_data = array();
 

//Creamos el JSON
$json_string = json_encode($arr_data);
$file = '../save.json';
file_put_contents($file, $json_string); */


if ($name != ""){
    /* Respuesta a Js */
    echo json_encode($json_data);
};




 /* if (isset($_POST['enviar'])){
     if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['movie']) && !empty($_POST['package'])){
        $titulo    = 'El título';
        $mensaje   = 'Hola';
        $cabeceras = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $para = $_POST['email'];
       $mail = @mail($pa,$mensaje,$cabeceras);
        if($mail){
            echo "<h4> se ha enviado un mail !</h4>";
        }
     } 
    }
    */
 ?>