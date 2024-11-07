<?php

require_once __DIR__.'/../vendor/autoload.php';

// Récupération de l'EntityManager
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

use App\Entity\OneToMany\Unidirectionnelle\Post;

// Création d'un nouveau post
$post = new Post();
$post->setTitre("Mon premier article");
$post->setContenu("Ceci est le contenu de mon premier article de blog.");
$post->setCreatedAt(new DateTime());
$post->setNbLikes(0);

try {
    // Persister l'objet
    $entityManager->persist($post);
    
    // Exécuter la transaction
    $entityManager->flush();
    
    echo "Post créé avec l'ID : " . $post->getId() . "\n";
    
} catch (Exception $e) {
    echo "Une erreur s'est produite lors de la création du post : " . $e->getMessage() . "\n";
} 