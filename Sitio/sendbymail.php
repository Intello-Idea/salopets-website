<?php

$result = null;

if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "ortopediainfantilvictorvargas@gmail.com,".$_POST['email'];
$email_subject = "Sitio web .: ".$_POST['sudget']."(".$_POST['name'].")";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['phone']) ||
!isset($_POST['sudget']) ||
!isset($_POST['comments'])) {

$result = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>x</span></button><strong>Mensaje no enviado</strong> Ocurrió un error y el formulario no ha sido enviado.</div>";
header('Location: index.php?result='.$result.'#what-we-do_');

die();
}

$email_message = "Detalles del formulario de contacto\n\n";
$email_message .= "Asunto: " . $_POST['sudget'] . "\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['phone'] . "\n";
$email_message .= "Comentarios: " . $_POST['comments'] . "\n\n";


$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/plain; charset=utf-8\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: php\n";
$headers .= "From: \"".$_POST['name']."\" <".$_POST['email'].">\n";

@mail($email_to, $email_subject, $email_message, $headers);

$result = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>x</span></button><strong>Mensaje enviado</strong> Gracias pronto te contactaremos.</div>";



sleep(5);
header('Location: index.php?result='.$result.'#what-we-do_');
}
?>
