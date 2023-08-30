<?php
// Paramètres
$baseURL = "http://localhost/atypikhouse"; // Remplacez par l'URL de votre site

// Pages de votre site
$pages = array(
    "/",
    "/property.php",
    "/about.php",
    "/contact.php",
    "/presse.php",
    "/login.php",
    "/politique.php",
    "/cgv.php",
    "/mentions.php",
);

// Créer le contenu XML
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($pages as $page) {
    $url = $baseURL . $page;
    $xml .= '<url>' . PHP_EOL;
    $xml .= '    <loc>' . $url . '</loc>' . PHP_EOL;
    $xml .= '    <lastmod>' . date('c') . '</lastmod>' . PHP_EOL;
    $xml .= '    <priority>0.5</priority>' . PHP_EOL;
    $xml .= '</url>' . PHP_EOL;
}

$xml .= '</urlset>' . PHP_EOL;

// Header pour indiquer que c'est un fichier XML
header("Content-Type: application/xml; charset=utf-8");

// Afficher le contenu XML
echo $xml;
?>
