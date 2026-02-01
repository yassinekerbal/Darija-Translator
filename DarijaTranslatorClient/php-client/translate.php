<?php
// Désactiver l'affichage des erreurs pour éviter de polluer la réponse
error_reporting(0);
ini_set('display_errors', 0);

// 1. Récupérer le texte envoyé par index.php
$text = trim(file_get_contents("php://input"));

if ($text === '') {
    echo "Texte vide";
    exit;
}

// 2. Configuration de l'appel vers le service Java (API)
$url = "http://localhost:8080/translator-service/api/translate";

$options = [
    "http" => [
        "method"  => "POST",
        "header"  => "Content-Type: text/plain; charset=UTF-8\r\n",
        "content" => $text
    ]
];

$context  = stream_context_create($options);

// 3. Exécution de la requête
$response = @file_get_contents($url, false, $context);

if ($response === false) {
    echo "Service indisponible";
    exit;
}

/* ===============================
   EXTRACTION NETTOYÉE DU RÉSULTAT
   =============================== */

// Supprimer les balises HTML si le service en renvoie
$clean_response = strip_tags($response);

// Découper le texte en lignes et nettoyer les espaces vides
$lines = explode("\n", str_replace("\r", "", $clean_response));
$lines = array_map('trim', $lines);
$lines = array_filter($lines);

// On récupère la toute dernière ligne (qui devrait être "السلام" ou votre traduction)
$final_translation = end($lines);

// Vérification de sécurité : si la dernière ligne ressemble encore à une erreur PHP
if (strpos($final_translation, 'Deprecated') !== false || strpos($final_translation, 'Warning') !== false) {
    echo "Erreur lors de la récupération de la traduction";
} else {
    // On affiche uniquement le résultat propre
    echo $final_translation;
}
?>