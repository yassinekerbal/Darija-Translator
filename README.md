#  LLM-powered English → Moroccan Darija Translator

##  Description du projet

Ce projet consiste à développer un **service web RESTful** permettant la traduction automatique
de l’anglais vers le dialecte marocain **Darija**, en s’appuyant sur un **Large Language Model (LLM)**.

Le système repose sur une **architecture client–service** :

* un service REST développé en **Java (Jakarta EE / JAX-RS)**,
* des clients consommateurs (PHP et extension Chrome).

La traduction est assurée par l’API **Google Gemini (offre gratuite)**.


##  Objectifs du projet

* Exposer une API REST `/api/translate`
* Traduire un texte anglais vers le Darija
* Intégrer un LLM pour une traduction contextuelle
* Proposer plusieurs clients pour consommer le service
* Gérer les erreurs (quota API, service indisponible)


##  Architecture du projet

Darija-Translator

* translator-service

  * pom.xml
  * src/main/java/com/service/translation

    * TranslationApp.java
    * TranslatorResource.java
    * Translator.java
    * package-info.java
  * src/main/webapp

    * index.html

* DarijaTranslatorClient

  * php-client

    * index.php
    * translate.php
    * style.css
  * chrome-extension

    * manifest.json
    * sidepanel.html
    * sidepanel.js

* README.md


## ⚙️ Technologies utilisées

* Java 11+
* Jakarta EE / JAX-RS
* Google Gemini API (LLM)
* PHP
* HTML / CSS / JavaScript
* Chrome Extension (Manifest V3)
* Maven
* Postman, SoapUI, cURL


## 🔌 Service REST (Partie Java)

* Endpoint principal : `/api/translate`
* Méthode : POST
* Entrée : texte en anglais (text/plain)
* Sortie : traduction en Darija (text/plain)
* Communication avec l’API Gemini
* Gestion des erreurs (quota API, indisponibilité)


## 🖥️ Clients consommateurs

### Client Web PHP

* Interface web simple
* Envoi du texte au service Java
* Nettoyage de la réponse
* Support RTL pour l’arabe

Fichiers :

* index.php
* translate.php
* style.css


### Extension Chrome

* Side Panel (Manifest V3)
* Traduction directe dans le navigateur
* Communication avec le client PHP
* Affichage correct en arabe (RTL)

Fichiers :

* manifest.json
* sidepanel.html
* sidepanel.js


##  Tests

Le service a été testé avec :

* cURL
* Postman
* SoapUI
* Client PHP
* Extension Chrome


##  Lancement du projet

### 1️⃣ Service Java

* Ouvrir `translator-service` dans Eclipse
* Vérifier Maven
* Démarrer le serveur (Tomcat / Payara / GlassFish)
* URL du service :
  [http://localhost:8080/translator-service/api/translate](http://localhost:8080/translator-service/api/translate)

### 2️⃣ Client PHP

* Copier `DarijaTranslatorClient` dans `htdocs`
* Démarrer Apache (XAMPP)
* Accéder à :
  [http://127.0.0.1/DarijaTranslatorClient/php-client/index.php](http://127.0.0.1/DarijaTranslatorClient/php-client/index.php)

### 3️⃣ Extension Chrome

* Ouvrir `chrome://extensions`
* Activer le mode développeur
* Cliquer sur “Load unpacked”
* Sélectionner le dossier `chrome-extension`


##  Sécurité & limites

* L’authentification Jakarta était prévue
* Non intégrée par manque de temps
* L’architecture permet une extension future


##  Vidéo de démonstration

La vidéo (≈ 5 minutes) présente :

* l’architecture du projet
* le service REST
* les tests
* le client PHP
* l’extension Chrome

Lien de la vidéo :
https://drive.google.com/file/d/1MliNU8oJ8fufD69S4dLEvoqiuVBHK0f_/view?usp=drive_link

##  Améliorations futures

* Sécurisation de l’API
* Support JSON
* Cache des traductions
* Synthèse vocale
* Autres modèles LLM


##  Auteur

Yassine Kerbal
