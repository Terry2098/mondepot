<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal-code'];
  $card_number = $_POST['card-number'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
// Traitement de la commande, insertion dans la bdd, etc.
 $message = "Votre commande a été passée avec succès.";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande - Ma Boutique</title>
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
        <section class="checkout">
             <h2>Informations de Commande</h2>
             <?php display_message($message, 'success'); ?>
             <form action="commande.php" method="post">
              <h3>Adresse de Livraison</h3>
                <label for="name">Nom:</label>
              <input type="text" id="name" name="name" required>
               <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                 <label for="address">Adresse:</label>
                <input type="text" id="address" name="address" required>
                  <label for="city">Ville:</label>
                <input type="text" id="city" name="city" required>
                  <label for="postal-code">Code Postal:</label>
                <input type="text" id="postal-code" name="postal-code" required>

                 <h3>Informations de Paiement</h3>
                <label for="card-number">Numéro de Carte:</label>
                <input type="text" id="card-number" name="card-number">
                <label for="expiry">Date d'Expiration (MM/AA): </label>
                <input type="text" id="expiry" name="expiry" required placeholder="MM/AA">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
                <button type="submit">Passer la commande</button>
             </form>
        </section>
    </main>
    <footer>
      <p>&copy; <?php echo date("Y"); ?> Ma boutique</p>
    </footer>
</body>
</html>
