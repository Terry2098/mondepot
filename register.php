<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

     $sql = "SELECT * FROM users WHERE email = :email";
      $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
      $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $message = "Cette adresse email est déjà utilisée.";
    } else {
       $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
      $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
         $stmt->bindParam(":password", $hashed_password);

        if ($stmt->execute()) {
           redirect_to('login.php?success=true');
        } else {
           $message = "Erreur lors de l'inscription.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Ma Boutique</title>
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
    <main >
         <!-- Bouton pour ouvrir la pop-up -->
    <button class="btne" onclick="openPopup()">Ajouter</button>

<!-- Overlay (fond sombre) -->
<div id="overlay" class="overlay"></div>

<!-- Fenêtre Pop-up -->
<div id="popup" class="popup">
    <span class="close-btn" onclick="closePopup()">&times;</span><br>
    <div class="pop-title">
    <i class="bi bi-person-fill"></i><br>
    <h2 class="addh">Formulaire d'ajout</h2>
    </div>
            
            
            <form action="register.php" method="post">
                <div class="form-container">
                <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" required >


                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required >


                    <label for="email">mot de passe :</label>
                    <input type="password" name="password" id="password" required >
                  
               
                 <?php display_message($message, 'error'); ?>
               <button type="submit" class="btne">S'inscrire</button>
               
            </form>
</div>
             <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous</a></p>
 


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
     <script>
    // Fonction pour ouvrir la pop-up
    function openPopup() {
        document.getElementById("popup").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    // Fonction pour fermer la pop-up
    function closePopup() {
        document.getElementById("popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script>
</body>
</html>
