
<?php
require 'vendor/autoload.php'; // Inclure le fichier autoload de Composer

// Paramètres SMTP
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.ionos.fr';
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';
$mail->SMTPSecure = 'ssl';
$mail->Username = 'no-reply@cecsolutions.fr';
$mail->Password = 'Cabesije12@';
$mail->Port = 465;

// Configurer l'expéditeur et le destinataire
$mail->setFrom('no-reply@cecsolutions.fr', 'Epiphane');
$mail->addAddress('dossousandrin@gmail.com', 'Test');
//$mail->addAddress('recipient2@example.com', 'Destinataire 2');

// Contenu du message
$mail->isHTML(true);
$mail->Subject = 'Sujet du message';
$mail->Body = 'Contenu du message';

// Envoyer l'e-mail
if ($mail->send()) {
    echo 'E-mail envoyé avec succès !';
} else {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
}
?>



