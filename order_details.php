<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

if (!is_logged_in()) {
    redirect_to('login.php');
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to('compte.php'); // Redirige si l'ID n'est pas valide
}

$order_id = $_GET['id'];
$user_id = $_SESSION['user_id'];


// Requête SQL pour récupérer les informations de la commande et vérifier que l'utilisateur est bien celui qui a passé la commande.
$sql = "SELECT * FROM orders WHERE id = :order_id AND user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":order_id", $order_id);
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    redirect_to('compte.php'); // Redirige si la commande n'existe pas ou n'appartient pas à l'utilisateur
}
// Requête SQL pour récupérer les articles de la commande
$sql_items = "SELECT oi.quantity, oi.price, p.name, p.image FROM order_items oi INNER JOIN products p ON oi.product_id = p.id WHERE oi.order_id = :order_id";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bindParam(":order_id", $order_id);
$stmt_items->execute();
$order_items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Commande #<?php echo $order['id']; ?> - Ma Boutique</title>
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
        <section class="order-details">
            <h2>Détails de la Commande #<?php echo $order['id']; ?></h2>
            <p><strong>Date de la commande :</strong> <?php echo $order['order_date']; ?></p>
             <p><strong>Adresse de livraison :</strong> <?php echo $order['shipping_address']; ?></p>
             <p><strong>Total de la commande :</strong> <?php echo $order['total']; ?></p>
               <p><strong>Status de la commande :</strong> <?php echo $order['status']; ?></p>
            <h3>Articles de la Commande :</h3>
            <div class="order-items">
                  <?php foreach ($order_items as $item) : ?>
                    <div class="order-item">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                      <h4><?php echo $item['name']; ?></h4>
                         <p>Quantité: <?php echo $item['quantity']; ?></p>
                      <p>Prix unitaire: <?php echo $item['price']; ?></p>
                  </div>
                 <?php endforeach; ?>
            </div>
           <a href="compte.php" class="btn">Retour au compte</a>
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
