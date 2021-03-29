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

// Read Json
$data_json = file_get_contents('../save.json');
$json_data = json_decode($data_json, true);

if(sizeof($json_data) > 0 ){
   array_push($json_data, new Data($name,$email,$package,$movie,$_price));
    
}else{
    $json_data = array( new Data($name,$email,$package,$movie,$_price));
}
 
//Put or create JSON
$json_string = json_encode($json_data);
$file = '../save.json';
file_put_contents($file, $json_string); 


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