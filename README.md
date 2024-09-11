# Email via SMTP

**email_via_smtp** est un projet simple permettant d'envoyer des e-mails via le protocole SMTP en utilisant PHP. Ce projet peut être utilisé pour envoyer des e-mails automatiques depuis une application ou un site web.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre serveur ou votre environnement de développement :

- PHP 7.x ou plus
- Accès à un serveur SMTP (comme Gmail, Yahoo, ou un serveur SMTP personnalisé)
- Les extensions PHP suivantes :
  - `php-mail` ou `PHPMailer` pour une meilleure gestion des envois d'e-mails.

## Installation

1. **Clonez le dépôt :**

   ```bash
   git clone https://github.com/FIFICOM/email_via_smtp.git
   
2. **Accédez au répertoire du projet :**
```bash
cd email_via_smtp
```
3. **Installez les dépendances (si vous utilisez PHPMailer) :**

```bash
composer install
```
**Configuration**

Avant d'envoyer un e-mail, vous devez configurer les paramètres SMTP dans le fichier config.php ou directement dans le script.

Exemple de configuration dans ```config.php :```

```bash
<?php
return [
    'smtp_host' => 'smtp.example.com',    // Adresse du serveur SMTP
    'smtp_port' => 587,                   // Port SMTP (587 pour TLS, 465 pour SSL)
    'smtp_user' => 'your_email@example.com', // Adresse e-mail
    'smtp_pass' => 'your_password',          // Mot de passe de l'e-mail
    'smtp_secure' => 'tls',               // Type de sécurité (tls ou ssl)
    'from_email' => 'your_email@example.com', // Adresse e-mail de l'expéditeur
    'from_name' => 'Your Name',           // Nom de l'expéditeur
];
```

## Utilisation
**Envoyer un e-mail :**
Utilisez la fonction suivante pour envoyer un e-mail via SMTP.
```bash
<?php
require 'config.php'; // Charger la configuration SMTP

// Inclure la classe PHPMailer si nécessaire
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

try {
    // Configurer le serveur SMTP
    $mail->isSMTP();
    $mail->Host       = $config['smtp_host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['smtp_user'];
    $mail->Password   = $config['smtp_pass'];
    $mail->SMTPSecure = $config['smtp_secure'];
    $mail->Port       = $config['smtp_port'];

    // Paramètres de l'e-mail
    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body    = 'Ceci est le corps du message';

    // Envoyer l'e-mail
    if($mail->send()) {
        echo 'E-mail envoyé avec succès';
    } else {
        echo 'L\'e-mail n\'a pas pu être envoyé';
    }
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
```

## Testez l'envoi :
**Lancez le script dans votre environnement PHP pour tester l'envoi de l'e-mail.**
### Notes importantes
Assurez-vous que votre fournisseur de services **SMTP (comme Gmail)** autorise l'envoi d'e-mails depuis des applications non sécurisées. Pour Gmail, vous devrez activer "Accès moins sécurisé" ou générer un mot de passe d'application.

En cas de problème de connexion au serveur SMTP, vérifiez que votre serveur n'a pas bloqué les ports 465 ou 587.

### Contribution
Les contributions sont les bienvenues ! Si vous avez des suggestions ou des améliorations à proposer, n'hésitez pas à ouvrir une pull request ou à soumettre un issue.

### Licence
Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus de détails.
