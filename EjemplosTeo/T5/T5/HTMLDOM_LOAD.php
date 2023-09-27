<?php
    $html='<html><head> <meta charset="utf-8"><title>PHP_WEB</title></head><body><div><h1>Web page parsing</h1><p>This is an example Web page.</p></div></body></html>';
    $doc = new DOMDocument();
    $doc->loadHTML ($html);
    $h2 = $doc->createElement('h2');
    $h1= $doc->getElementsByTagName("h1")[0];
    $h1->parentNode->appendChild($h2);
    $h2->appendChild($doc->createTextNode('Esto es el H2'));
    $doctype="<!DOCTYPE html >";
    echo $doctype.$doc->saveHTML();
    ?>
