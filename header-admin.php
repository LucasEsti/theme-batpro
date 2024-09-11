
    <?php
// Déterminez le schéma (http/https) et le nom d'hôte
$scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];

// Déterminez le chemin de base de votre application
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

// Définir l'URL de base
$source = get_bloginfo("template_url");
 
$uploadsUrl = $source . "/realtime-batpro/uploads/";


?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="<?php bloginfo("template_url");  ?>/realtime-batpro/direct-messaging/dist/style.css">
    <style>
                #listPeople {
            overflow-x: scroll;
            height: 75%;
            position: relative;
        }
        /* Styles pour le modal */
.modal {
    display: none; /* Masquer le modal par défaut */
    position: fixed; /* Reste en place même lors du défilement */
    z-index: 1; /* Au-dessus des autres éléments */
    left: 0;
    top: 0;
    width: 100%; /* Largeur pleine */
    height: 100%; /* Hauteur pleine */
    overflow: auto; /* Activer le défilement si nécessaire */
    background-color: rgb(0,0,0); /* Couleur de fond noire */
    background-color: rgba(0,0,0,0.4); /* Fond légèrement transparent */
}

/* Styles pour le contenu du modal */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* Centrer le modal */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Largeur du modal */
}

/* Style pour le bouton de fermeture */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>
</head>
<body>