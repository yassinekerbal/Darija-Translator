# 🇲🇦 LLM-Powered English → Moroccan Darija Translator

## Description du projet
Ce projet consiste à développer un **service web RESTful basé sur un LLM** permettant la **traduction de l’anglais vers le dialecte marocain (Darija)**.

Le projet a été réalisé dans le cadre du **cours Web Services**, encadré par **Pr. El Habib Nfaoui**.

Le système repose sur :
- un **service REST Java (JAX-RS)**,
- un **client PHP**,
- une **extension Chrome (Manifest V3)**,
- et un **LLM (Google Gemini – version gratuite)** pour effectuer la traduction.

---

## Objectifs
- Implémenter un service RESTful `TranslatorResource`
- Consommer un LLM pour la traduction automatique
- Tester le service avec **cURL, Postman et SoapUI**
- Développer un **client PHP**
- Intégrer le service dans une **extension Chrome**
- Fournir une architecture claire et extensible

---

## Architecture du projet

Darija-Translator/
│
├── translator-service/ # Service REST Java (JAX-RS)
│ ├── pom.xml
│ └── src/main/java/com/service/translation/
│ ├── TranslationApp.java
│ ├── TranslatorResource.java
│ └── Translator.java
│
├── DarijaTranslatorClient/
│ ├── php-client/ # Client PHP
│ │ ├── index.php
│ │ ├── translate.php
│ │ └── style.css
│ │
│ └── chrome-extension/ # Extension Chrome (Manifest V3)
│ ├── manifest.json
│ ├── sidepanel.html
│ └── sidepanel.js
│
└── README.md


---

## Service REST (Java – JAX-RS)

### Endpoint principal


POST /translator-service/api/translate


### Description
- Reçoit un texte en anglais (format `text/plain`)
- Appelle un **LLM (Google Gemini)**
- Retourne la traduction en **Darija**

### Exemple avec cURL
```bash
curl -X POST http://localhost:8080/translator-service/api/translate \
     -H "Content-Type: text/plain" \
     -d "Hello how are you?"

Tests du service

Le service a été testé avec :

✅ cURL

✅ Postman

✅ SoapUI

Les erreurs de quota (ex. 429 – Too Many Requests) sont correctement gérées et retournées au client.

 Client PHP
Fonctionnalités

Interface web simple

Envoi du texte au service REST

Affichage propre de la traduction (RTL pour l’arabe)

Gestion des erreurs (service indisponible, texte vide)

Fichiers principaux

index.php : interface utilisateur

translate.php : proxy vers le service REST

style.css : design moderne

 Extension Chrome (Manifest V3)
Fonctionnalités

Utilisation de chrome.sidePanel

Traduction directement depuis le navigateur

Appel du client PHP via fetch

Affichage instantané du résultat en Darija

Technologies

Manifest V3

JavaScript

HTML / CSS

API Fetch

 Vidéo de démonstration (5 minutes)

Une vidéo de démonstration présente :

l’architecture du projet

le service REST en Java

les tests (cURL / Postman)

le client PHP

l’extension Chrome

le résultat final de la traduction

👉 Lien de la vidéo :
https://drive.google.com/drive/folders/1_KroaTyz7n4IUtfZ-K0pDG-Dzkq3kxld?usp=drive_link

🔐 Sécurité

La sécurisation via Jakarta Authentication (Basic Auth) était prévue.
Cependant, par manque de temps, elle n’a pas été intégrée dans cette version.

L’architecture permet toutefois son ajout facilement dans une version future.

🛠️ Technologies utilisées

Java 11+

Jakarta EE / JAX-RS

Google Gemini API (LLM)

PHP

HTML / CSS / JavaScript

Chrome Extension (Manifest V3)

Postman, SoapUI, cURL

## Améliorations possibles

Authentification (Jakarta Security)

Traduction vocale (speech-to-text / text-to-speech)

Support d’autres langues

Déploiement avec un conteneur embarqué

Utilisation d’un LLM local

## Auteur

Yassine Kerbal
Projet réalisé dans le cadre du cours Web Services
