<?php

// Déclaration du typage strict pour éviter les conversions sauvages de PHP
declare(strict_types=1);

// Inclusion des dépendances
include 'functions.php';
include 'class/Shape.php';
include 'class/Rectangle.php';
include 'class/Ellipse.php';
include 'class/Polygon.php';
include 'class/Square.php';
include 'class/Circle.php';
include 'class/Triangle.php';

// Création d'un rectangle
$rect = new Rectangle();
$rect->setLocation(50, 100);
$rect->setSize(200, 75);
$rect->setFill('green', 0.8);

// Création d'une ellipse
$ell = new Ellipse();
$ell->setLocation(420, 359);
$ell->setRadius(50, 120);
$ell->setFill('blue', 0.5);

// Création d'un polygone
$poly = new Polygon();
$poly->setPoints(200, 300, 150, 400, 50, 150, 600, 550, 450, 100);
$poly->setFill('crimson', 1);

// Création d'un carré
$square = new Square();
$square->setLocation(400,500);
$square->setFill('maroon', 1);
$square->setSize(125);

// Création d'un cercle
$circle = new Circle();
$circle->setLocation(350, 120);
$circle->setFill('forestgreen', 0.5);
$circle->setRadius(28);

// Création d'un triangle
$triangle = new Triangle();
$triangle->setFill('blue', 0.9);
$triangle->setCoordinates(100,200,510,150,300,450);

// Construction du code SVG
$svg = '<svg width="1200" height="800">';

// Ajout des formes
$svg .= $rect->draw();
$svg .= $ell->draw();
$svg .= $poly->draw();
$svg .= $square->draw();
$svg .= $circle->draw();
$svg .= $triangle->draw();

$svg .= '</svg>';


// Inclusion du template
include 'index.phtml';