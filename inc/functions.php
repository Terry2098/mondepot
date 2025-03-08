<?php
session_start(); // Démarre la session au début pour pouvoir l'utiliser dans le reste des pages.

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function get_user_info($conn, $user_id){
  $sql = "SELECT * FROM users WHERE id = :id";
  $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function display_message($message, $type = 'success'){
     if ($message) {
         echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
    }
}
function redirect_to($url) {
  header("Location: " . $url);
  exit();
}
?>
