<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit - Ma Boutique</title>
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
        <section class="product-details">
            <div class="product-images">
              <div class="main-image">
                  <img src="img/produit1.jpg" alt="Produit 1">
              </div>
               <div class="small-images">
                   <img src="img/produit1-1.jpg" alt="Image 1">
                     <img src="img/produit1-2.jpg" alt="Image 2">
                       <img src="img/produit1-3.jpg" alt="Image 3">
               </div>
            </div>
            <div class="product-info">
                <h2>Nom du Produit</h2>
                <p class="price">$49.99</p>
                <p>Description détaillée du produit avec ses caractéristiques, les matières utilisées, etc.</p>
                <p><strong>Tailles disponibles:</strong> S, M, L</p>
                <div class="add-cart">
                    <a href="panier.php"><button class="btn">Ajouter au panier</button></a>
                    <button class="btn">Acheter maintenant</button>
                </div>
                 <div class="share-buttons">
                   <a href="#" title="Partager sur Facebook"><img src="img/facebook.png" alt="Facebook"></a>
                    <a href="#" title="Partager sur Twitter"><img src="img/twitter.png" alt="Twitter"></a>
                     <a href="#" title="Partager sur Instagram"><img src="img/instagram.png" alt="Instagram"></a>
                </div>
            </div>
        </section>

          <section class="customer-reviews">
              <h2>Avis Clients</h2>
              <div class="review">
                 <p>"Excellent produit, très content de mon achat!"</p>
                  <p>- Client 1</p>
              </div>
                <div class="review">
                    <p>"Qualité incroyable, service client au top!"</p>
                    <p>- Client 2</p>
                </div>
          </section>

           <section class="related-products">
            <h2>Produits Similaires</h2>
            <div class="product-grid">
              <div class="product">
                    <img src="img/produit2.jpg" alt="Produit 2">
                    <h3>Produit 2</h3>
                    <p>Description du produit...</p>
                     <span class="price">$39.99</span>
                 </div>
                  <div class="product">
                    <img src="img/produit3.jpg" alt="Produit 3">
                    <h3>Produit 3</h3>
                    <p>Description du produit...</p>
                     <span class="price">$59.99</span>
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
