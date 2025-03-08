
<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits - Ma Boutique</title>
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
          <section class="category-navigation">
             <h2>Categories</h2>
             <ul class="category-list">
                <li><a href="#">Vêtements </a>
                  <ul class="sub-category-list">
                   <li><a href="#">Chemises</a></li>
                      <li><a href="#">Pantalons</a></li>
                      <li><a href="#">Robes</a></li>
                </ul>
                </li>
                <li><a href="#">Chaussures</a>
                  <ul class="sub-category-list">
                   <li><a href="#">Baskets</a></li>
                      <li><a href="#">Talons</a></li>
                      <li><a href="#">Bottines</a></li>
                </ul>
                </li>
                <li><a href="#">Accessoires</a>
                   <ul class="sub-category-list">
                   <li><a href="#">Chapeaux</a></li>
                      <li><a href="#">Echarpes</a></li>
                      <li><a href="#">Bijoux</a></li>
                </ul>
                </li>
             </ul>
          </section>

        <section class="product-list">
            <h2>Tous les Produits</h2>
           <div class="product-filters">
             <label for="price-filter">Prix : </label>
              <select name="price-filter" id="price-filter">
                 <option value="all">Tous les prix</option>
                <option value="low-to-high">Prix croissant</option>
                <option value="high-to-low">Prix décroissant</option>
               </select>
             <label for="brand-filter">Marque : </label>
              <select name="brand-filter" id="brand-filter">
                 <option value="all">Toutes les marques</option>
                <option value="marque1">Marque 1</option>
                <option value="marque2">Marque 2</option>
               </select>
               <label for="size-filter">Taille : </label>
              <select name="size-filter" id="size-filter">
                 <option value="all">Toutes les tailles</option>
                <option value="S">S</option>
                <option value="M">M</option>
                 <option value="L">L</option>
               </select>
           </div>
            <div class="product-grid">
                <!-- Exemple de produit -->
                <div class="product">
                    <img src="img/produit1.jpg" alt="Produit 1">
                    <h3>Produit 1</h3>
                    <p>Description du produit...</p>
                     <span class="price">$49.99</span>
                   <a href="produit.php" class="btn">Voir Détails</a>
                </div>
                   <div class="product">
                    <img src="img/produit2.jpg" alt="Produit 2">
                    <h3>Produit 2</h3>
                    <p>Description du produit...</p>
                     <span class="price">$39.99</span>
                       <a href="produit.php" class="btn">Voir Détails</a>
                   </div>
                   <div class="product">
                    <img src="img/produit3.jpg" alt="Produit 3">
                    <h3>Produit 3</h3>
                    <p>Description du produit...</p>
                     <span class="price">$59.99</span>
                       <a href="produit.php" class="btn">Voir Détails</a>
                  </div>
                <!-- ... autres produits ... -->
            </div>
            
          <div class="sort-options">
               <label for="sort-by">Trier par :</label>
                <select name="sort-by" id="sort-by">
                   <option value="popularity">Popularité</option>
                    <option value="price-low-high">Prix croissant</option>
                    <option value="price-high-low">Prix décroissant</option>
                    <option value="newest">Nouveauté</option>
                </select>
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
</body>
</html>
