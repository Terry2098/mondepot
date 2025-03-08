<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
       $_SESSION['user_id'] = $user['id'];
       redirect_to('index.php');
    } else {
       $message = "<h6>Email ou mot de passe incorrect.</h6>";
       
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Ma Boutique</title>
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
        <section class="login">
            <h2>Connexion</h2>
            
            <form action="login.php" method="post">
            <div class="entryarea">
                    <input type="email" name="email" id="email" required >
                    <div class="labelline">email:</div>
                </div><br><br>
                <div class="entryarea">
                    <input type="password" name="password" id="password" required >
                    <div class="labelline">mot de passe:</div>
                </div><br><br>
               <button type="submit" class="btn">Se Connecter</button>
               <?php display_message($message, 'error'); ?>
            </form>
           <p>Pas encore de compte? <a href="register.php">Inscrivez-vous</a></p>
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
