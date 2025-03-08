<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

// Requête SQL pour récupérer les articles de blog (exemple simple)
$sql = "SELECT * FROM blog_posts ORDER BY created_at DESC"; // Remplacez blog_posts par le nom de votre table de blog
$stmt = $conn->query($sql);
$blog_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Ma Boutique</title>
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
        <section class="blog">
            <h2>Blog et Actualités</h2>
            <div class="blog-articles">
                 <?php foreach ($blog_posts as $post) : ?>
                    <div class="blog-article">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                        <h3><?php echo $post['title']; ?></h3>
                        <p><?php echo substr($post['content'], 0, 200); ?>...</p>
                         <a href="blog_post.php?id=<?php echo $post['id']; ?>" class="btn">Lire la suite</a> <!-- Lien vers la page de l'article individuel -->
                    </div>
                <?php endforeach; ?>

                 <?php if(empty($blog_posts)): ?>
                    <p>Aucun article de blog disponible pour le moment.</p>
                 <?php endif; ?>
            </div>
             <div class="blog-news">
               <h3>Actualités</h3>
                 <p>Découvrez notre nouvelle collection printemps-été 2024!</p>
              <p>Profitez de 20% de réduction sur tous les articles jusqu'à la fin du mois.</p>
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
