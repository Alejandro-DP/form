<?php
 if (isset($_POST['enviar'])){
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
 ?>