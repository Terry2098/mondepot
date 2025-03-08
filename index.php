
<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique de Vêtements et Chaussures</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="node_modules\bootstrap-icons\font\bootstrap-icons.min.css">

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

    <section class="banner">
        <div class="container">
           <img src="img/hab1.jpg" alt="Banniere de la boutique">
           <div class="banner-text">
             <h2>Les dernières tendances vous attendent!</h2>
             <p>Decouvrez notre toute nouvelle collection et donnez un style unique a votre garde-robe</p>
            <a href="produits.php" class="btn">Découvrir</a>
           </div>
        </div>
    </section>

    <main class="container">
      
        <section class="featured-products">
            <h2>Nouveautés</h2>
            <div class="product-grid">
                <div class="product">
                    <img src="img/nou1.jpg" alt="Nouveau Produit 1">
                    <h3>Produit 1</h3>
                    <p>Description du produit...</p>
                    <span class="price">$49.99</span>
                </div>
                 <div class="product">
                    <img src="img/nou2.jpg" alt="Nouveau Produit 2">
                    <h3>Produit 2</h3>
                    <p>Description du produit...</p>
                    <span class="price">$39.99</span>
                </div>
                 <div class="product">
                    <img src="img/produit1.jpg" alt="Nouveau Produit 3">
                    <h3>Produit 3</h3>
                    <p>Description du produit...</p>
                    <span class="price">$59.99</span>
                </div>
            </div>
        </section>
        
        <section class="best-sellers">
            <h2>Meilleures Ventes</h2>
              <div class="product-grid">
                 <div class="product">
                    <img src="img/nou4.jpg" alt="Meilleure Vente 1">
                    <h3>Produit 4</h3>
                    <p>Description du produit...</p>
                     <span class="price">$29.99</span>
                </div>
                <div class="product">
                    <img src="img/nou5.jpg" alt="Meilleure Vente 2">
                    <h3>Produit 5</h3>
                    <p>Description du produit...</p>
                     <span class="price">$34.99</span>
                </div>
                 <div class="product">
                    <img src="img/trico (56).jpg" alt="Meilleure Vente 3">
                    <h3>Produit 6</h3>
                    <p>Description du produit...</p>
                     <span class="price">$44.99</span>
                 </div>
            </div>
        </section>

        <section class="promotions">
            <h2>Promotions</h2>
               <div class="product-grid">
                  <div class="product">
                    <img src="img/produit7.jpg" alt="Promo 1">
                    <h3>Produit 7</h3>
                    <p>Description du produit...</p>
                      <span class="price discounted">$19.99</span>
                      <span class="original-price">$29.99</span>
                </div>
                 <div class="product">
                    <img src="img/produit8.jpg" alt="Promo 2">
                    <h3>Produit 8</h3>
                    <p>Description du produit...</p>
                    <span class="price discounted">$49.99</span>
                      <span class="original-price">$59.99</span>
                 </div>
                  <div class="product">
                    <img src="img/produit9.jpg" alt="Promo 3">
                    <h3>Produit 9</h3>
                    <p>Description du produit...</p>
                       <span class="price discounted">$24.99</span>
                       <span class="original-price">$34.99</span>
                </div>
            </div>
        </section>

         <section class="events">
          <h2>Événements</h2>
           <div class="event">
               <h3>Événement 1</h3>
             <p>Description de l'événement...</p>
             <img src="img/event1.jpg" alt="evenement 1">
           </div>
             <div class="event">
               <h3>Événement 2</h3>
             <p>Description de l'événement...</p>
              <img src="img/event2.jpg" alt="evenement 2">
           </div>
          
        </section>
    </main>

    <footer>
        <div class="container">
          <div class="social-links">
                <a href=""><i class="bi bi-facebook" style="color: white;"></i></a>
                <a href=""><i class="bi bi-twitter" style="color: white;"></i></a>
                <a href=""><i class="bi bi-instagram" style="color: white;"></i></a>
                <!-- <a href="#"><img src="img/facebook.png" alt="Facebook"></a> -->
                <!-- <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="img/instagram.png" alt="Instagram"></a> -->
            </div>
            <p>&copy; <?php echo date("Y"); ?> Ma Boutique</p>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
