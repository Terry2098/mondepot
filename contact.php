<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

$message = "";
$type_message = 'success'; // Type de message par défaut (success)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message_text = $_POST['message'];

    // Validation des données (vous pouvez ajouter des validations plus poussées)
    if (empty($name) || empty($email) || empty($message_text)) {
        $message = "Veuillez remplir tous les champs.";
        $type_message = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse email invalide.";
        $type_message = 'error';
    } else {
        // Préparation de la requête SQL
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":message", $message_text);

        // Exécution de la requête
        if ($stmt->execute()) {
            $message = "Votre message a été envoyé avec succès.";
        } else {
            $message = "Erreur lors de l'envoi du message. Veuillez réessayer.";
            $type_message = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Ma Boutique</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                 <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ma Boutique</a>
                </div>
                <ul class="navbar-nav">
                     <li><a href="index.php">Accueil</a></li>
                     <li><a href="produits.php">Produits</a></li>
                     <li><a href="blog.php">Blog</a></li>
                     <li><a href="contact.php">Contact</a></li>
                     <?php if(is_logged_in()) : ?>
                        <li><a href="compte.php">Compte</a></li>
                        <li><a href="logout.php">Déconnexion</a></li>
                     <?php else: ?>
                         <li><a href="login.php">Connexion</a></li>
                          <li><a href="register.php">Inscription</a></li>
                     <?php endif; ?>
                </ul>
            </div>
            </nav>
    </header>
    <main class="container">
        <section class="contact">
            <h2>Contactez-Nous</h2>
           <?php display_message($message, $type_message); ?>
           <form action="contact.php" method="post">
               <label for="name">Nom:</label>
               <input type="text" id="name" name="name" required>
               <label for="email">Email:</label>
                 <input type="email" id="email" name="email" required>
               <label for="message">Message:</label>
               <textarea name="message" id="message" rows="5" required></textarea>
                <button type="submit" class="btn">Envoyer</button>
           </form>
            <div class="contact-info">
               <h3>Informations de Contact</h3>
                <p><strong>Adresse:</strong> 123 Rue Principale, Ville</p>
               <p><strong>Téléphone:</strong> 123-456-7890</p>
               <p><strong>Email:</strong> info@maboutique.com</p>
                <p><strong>Heures d'ouverture:</strong> 10h - 18h, du lundi au samedi</p>
            </div>
           <div class="returns">
              <h3>Politique de retour</h3>
               <p>Les retours sont acceptés dans les 14 jours suivant l'achat, sous conditions.</p>
              <p>Veuillez nous contacter pour plus d'informations.</p>
          </div>

           <div class="social-contact">
               <h3>Contactez-nous sur les réseaux sociaux</h3>
               <div class="social-links">
                 <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
                  <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
                   <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
               </div>
           </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="social-links">
                <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
               <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
               <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
           </div>
           <p>&copy; <?php echo date("Y"); ?> Ma Boutique</p>
        </div>
    </footer>
     <script src="js/script.js"></script>
</body>
</html>
