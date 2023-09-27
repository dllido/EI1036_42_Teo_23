<?php
   
    $doc = new DOMDocument();
    $root = $doc->createElement('html');
    $doc->appendChild($root);
    $head = $doc->createElement('head');
    $root->appendChild($head);
    
    $title = $doc->createElement('title');
    $title->appendChild ($doc->createTextNode('Este es el título'));
    $head->appendChild($title);
    $body = $doc->createElement('body');
    $root->appendChild($body);
    $h1 = $doc->createElement('h1');
    $root->appendChild($h1);
    $h1->appendChild($doc->createTextNode('Esto es el H1'));
    $doctype="<!DOCTYPE html >";
    echo $doctype.$doc->saveHTML();
    ?>
