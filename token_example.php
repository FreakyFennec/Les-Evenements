<?php
// Définition d'un utilisateur (peut provenir d'une base de données)
$user = [
  'id' => 123,
  'username' => 'john_doe',
  'password' => 'secret'
];

// Fonction pour générer un token d'authentification
function generateAuthToken($user) {
  // Générer un token unique (vous pouvez utiliser une bibliothèque comme `firebase/php-jwt`)
  $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...'; // Token généré

  // Enregistrer le token pour l'utilisateur (vous pouvez utiliser une base de données ou un cache)
  $user['token'] = $token;

  return $token;
}

// Fonction pour vérifier l'authenticité d'un token
function verifyAuthToken($token) {
  // Vérifier si le token est valide (vous pouvez utiliser une bibliothèque comme `firebase/php-jwt`)
  $isValid = true; // Exemple de vérification de token

  return $isValid;
}

// Exemple d'utilisation

// Lorsque l'utilisateur se connecte avec succès
$authToken = generateAuthToken($user);
echo "Token généré : " . $authToken . "\n";

// Lorsque l'utilisateur envoie une demande de message avec le token
function sendMessage($message, $authToken) {
  // Vérifier l'authenticité du token
  if (verifyAuthToken($authToken)) {
    // Autoriser l'utilisateur à envoyer le message
    echo "Message envoyé : " . $message . "\n";
  } else {
    // Rejeter la demande si le token est invalide
    echo "Erreur : Token invalide\n";
  }
}

// Exemple d'envoi de message
sendMessage("Bonjour !", $authToken);
?>
