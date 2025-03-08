<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect_to('blog.php'); // Redirige vers la page du blog si l'ID n'est pas valide
}

$post_id = $_GET['id'];

// Requête SQL pour récupérer l'article de blog par son ID
$sql = "SELECT * FROM blog_posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $post_id);
$stmt->execute();
$blog_post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog_post) {
    redirect_to('blog.php'); // Redirige si l'article n'existe pas
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog_post['title']; ?> - Ma Boutique</title>
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
          <section class="blog-post">
            <h2><?php echo $blog_post['title']; ?></h2>
            <img src="<?php echo $blog_post['image']; ?>" alt="<?php echo $blog_post['title']; ?>" class="blog-post-image">
            <div class="blog-post-content">
               <?php echo $blog_post['content']; ?>
            </div>
           <a href="blog.php" class="btn">Retour au blog</a>
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
