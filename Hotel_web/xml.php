<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Show errors from libxml
libxml_use_internal_errors(false);

// this function does not exist in PHP 8+ 
// libxml_disable_entity_loader(true);
// $dom->loadXML($xml, LIBXML_NONET);

// Load the payload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xmlfile'])) {
    $xml = file_get_contents($_FILES['xmlfile']['tmp_name']);
} else {
    die("No XML file uploaded.");
}

$dom = new DOMDocument();
$dom->resolveExternals = true;
$dom->substituteEntities = true;

$dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);

echo $dom->saveXML();
?>
