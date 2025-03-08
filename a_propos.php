<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos - Ma Boutique</title>
    <link rel="stylesheet" href="css/style.css">
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

    <main class="container">
       <section class="about">
        <h2>À Propos de Nous</h2>
           <div class="about-content">
                 <img src="img/about.jpg" alt="À Propos Image">
              <div class="about-text">
                 <p>Bienvenue chez Ma Boutique, votre destination mode en ligne pour les vêtements et les chaussures. Fondée en 2024, notre boutique s'engage à offrir une sélection de qualité, tendance et variée, pour tous les goûts.</p>
                <p>Nous mettons un point d'honneur à proposer des produits qui allient confort et style, pour que vous vous sentiez bien dans vos vêtements et chaussures au quotidien.</p>
               <p>Notre équipe de passionnés est toujours à l'affût des dernières tendances pour vous proposer des collections uniques et originales.</p>
              <p>Nous sommes fiers de vous accompagner dans votre style, et nous espérons que vous apprécierez votre expérience chez Ma Boutique.</p>
              </div>
         </div>
           <h3>Nos valeurs</h3>
            <ul>
              <li>Qualité</li>
              <li>Tendance</li>
              <li>Service client</li>
              <li>Originalité</li>
            </ul>
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
