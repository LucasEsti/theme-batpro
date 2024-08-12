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
    <link rel="stylesheet" href="<?php bloginfo("template_url");  ?>/realtime-batpro/style/chatbox.css">
    