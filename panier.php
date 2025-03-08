<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - Ma Boutique</title>
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
        <section class="cart">
            <h2>Votre Panier</h2>
            <div class="cart-items">
                <!-- Exemple d'article dans le panier -->
                <div class="cart-item">
                    <img src="img/produit1.jpg" alt="Produit 1">
                    <div class="cart-item-info">
                        <h3>Produit 1</h3>
                        <p>Prix: $49.99</p>
                        <label for="quantity-1">Quantité:</label>
                        <input type="number" id="quantity-1" value="1" min="1">
                        <button class="remove-btn">Supprimer</button>
                    </div>
                </div>
                <!-- ... autres articles du panier ... -->
                <div class="cart-item">
                     <img src="img/produit2.jpg" alt="Produit 2">
                    <div class="cart-item-info">
                         <h3>Produit 2</h3>
                        <p>Prix: $39.99</p>
                         <label for="quantity-2">Quantité:</label>
                        <input type="number" id="quantity-2" value="1" min="1">
                         <button class="remove-btn">Supprimer</button>
                    </div>
                </div>
            </div>

            <div class="cart-summary">
                <h3>Récapitulatif</h3>
                <p>Sous-total: $89.98</p>
                <p>Frais de livraison: $5.00</p>
                <p>Total: $94.98</p>
                <a href="commande.php" class="btn">Passer la commande</a>
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
