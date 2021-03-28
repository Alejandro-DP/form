<?php
 if (isset($_POST['enviar'])){
     if (!empty($_POST['nom']) && !empty($_POST['correo']) && !empty($_POST['peli']) && !empty($_POST['pac'][0])){
        $titulo    = 'El título';
        $mensaje   = 'Hola';
        $cabeceras = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $para = $_POST['correo'];
       $mail = mail($pa,$mensaje,$cabeceras);
        if($mail){
            echo "<h4> se ha enviado un mail !</h4>";
        }
     }
 }
 ?>