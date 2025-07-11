<?php
$baseUrl = "http://www.NirvanaHotel.com/"; 
$targetDir = __DIR__ . "/.";        

function getPhpFiles($dir, $baseDir) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $pages = [];

    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') continue;

        $relativePath = str_replace($baseDir, '', $file->getPathname());
        $relativePath = str_replace('\\', '/', $relativePath); 

        $pages[] = [
            'loc' => rtrim($GLOBALS['baseUrl'], '/') . $relativePath,
            'lastmod' => date('Y-m-d', filemtime($file->getPathname())),
            'changefreq' => 'monthly',
            'priority' => '0.5'
        ];
    }

    return $pages;
}

$pages = getPhpFiles($targetDir, $targetDir);

// Generate the sitemap
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;

$urlset = $xml->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

foreach ($pages as $page) {
    $url = $xml->createElement('url');
    $url->appendChild($xml->createElement('loc', $page['loc']));
    $url->appendChild($xml->createElement('lastmod', $page['lastmod']));
    $url->appendChild($xml->createElement('changefreq', $page['changefreq']));
    $url->appendChild($xml->createElement('priority', $page['priority']));
    $urlset->appendChild($url);
}

$xml->appendChild($urlset);
$xml->save(__DIR__ . '/sitemap.xml');

echo "sitemap.xml has been generated successfully.\n";
