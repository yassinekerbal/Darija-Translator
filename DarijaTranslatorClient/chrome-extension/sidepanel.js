// sidepanel.js
async function translateText() {
  const input = document.getElementById("input").value;
  const output = document.getElementById("output");

  if (!input.trim()) return;

  output.value = "Traduction en cours...";

  try {
    const response = await fetch(
      "http://127.0.0.1/DarijaTranslatorClient/php-client/translate.php",
      {
        method: "POST",
        body: input,
        headers: { "Content-Type": "text/plain" }
      }
    );

    const result = await response.text();
    
    // Affichage du résultat avec support de l'Arabe (RTL)
    output.value = result.trim();
    output.style.direction = "rtl";
    output.style.textAlign = "right";

  } catch (error) {
    output.value = "Erreur de connexion au serveur PHP.";
    console.error("Erreur Fetch:", error);
  }
}

// On lie la fonction au bouton quand la page est prête
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector("button");
  if (btn) btn.addEventListener("click", translateText);
});