<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);

$text = '';
$result = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    $text = trim($_POST['text']);

    if ($text !== '') {
        $context = stream_context_create([
            "http" => [
                "method"  => "POST",
                "header"  => "Content-Type: text/plain; charset=UTF-8\r\n",
                "content" => $text
            ]
        ]);

        $response = @file_get_contents(
            "http://127.0.0.1/DarijaTranslatorClient/php-client/translate.php",
            false,
            $context
        );

        if ($response === false) {
            $error = "❌ Service indisponible";
        } else {
            $result = $response;
        }
    } else {
        $error = "⚠️ Veuillez saisir un texte";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English → Moroccan Darija</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="box">
    <h1>English → Moroccan Darija</h1>

    <form method="POST">
        <span class="label-text">Texte en anglais :</span>
        <textarea name="text" rows="4" placeholder="Enter English text..."><?= htmlspecialchars($text) ?></textarea>
        <button type="submit">Traduire</button>
    </form>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($result): ?>
        <div class="result">
            <b>Résultat :</b>
            <span class="translation-output"><?= nl2br(htmlspecialchars($result)) ?></span>
        </div>
    <?php endif; ?>
</div>
</body>
</html>