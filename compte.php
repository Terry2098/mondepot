<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

if (!is_logged_in()) {
   redirect_to('login.php');
}

$user_id = $_SESSION['user_id'];
$user_info = get_user_info($conn, $user_id);

// Requete SQL pour recuperer l'historique de commande
$sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - Ma Boutique</title>
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
        <section class="account">
            <h2>Mon Compte</h2>
            <div class="account-info">
                 <h3>Informations Personnelles</h3>
                  <p><strong>Nom:</strong> <?php echo $user_info['name']; ?></p>
                   <p><strong>Email:</strong> <?php echo $user_info['email']; ?></p>
                 <a href="#" class="btn">Modifier les informations</a>
             </div>

            <div class="order-history">
                <h3>Historique des Commandes</h3>
                <?php foreach ($orders as $order) : ?>
                     <div class="order">
                        <h4>Commande #<?php echo $order['id']; ?></h4>
                        <p>Date: <?php echo $order['order_date']; ?></p>
                        <p>Total: <?php echo $order['total']; ?></p>
                         <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn">Voir le détail</a> <!-- Lien vers la page du détail de la commande -->
                     </div>
                  <?php endforeach; ?>
                 <?php if(empty($orders)): ?>
                  <p>Vous n'avez pas encore passé de commandes.</p>
                 <?php endif; ?>
            </div>

           <div class="wishlist">
              <h3>Liste de Souhaits</h3>
                <div class="product">
                     <img src="img/produit1.jpg" alt="Produit 1">
                     <h3>Produit 1</h3>
                     <p>Description du produit...</p>
                      <span class="price">$49.99</span>
                     <a href="#" class="btn">Voir le detail</a>
                </div>
               <div class="product">
                    <img src="img/produit2.jpg" alt="Produit 2">
                    <h3>Produit 2</h3>
                    <p>Description du produit...</p>
                     <span class="price">$39.99</span>
                    <a href="#" class="btn">Voir le detail</a>
               </div>
           </div>
            <div class="newsletter">
               <h3>Gestion de la Newsletter</h3>
               <p>Abonné à la newsletter:</p>
                <button class="btn">Se desinscrire de la newsletter</button>
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
