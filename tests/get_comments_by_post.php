<?php

require_once __DIR__.'/../vendor/autoload.php';

// Récupération de l'EntityManager
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

use App\Entity\OneToMany\Unidirectionnelle\Comment;
use App\Entity\OneToMany\Unidirectionnelle\Post;

try {
    // ID du post dont on veut récupérer les commentaires
    $postId = 1; // vous pouvez modifier cet ID selon vos besoins
    
    // Récupérer le post
    $post = $entityManager->find(Post::class, $postId);
    
    if (!$post) {
        throw new Exception("Aucun post trouvé avec l'ID $postId");
    }

    // Créer une requête pour récupérer tous les commentaires de ce post
    $commentRepository = $entityManager->getRepository(Comment::class);
    $comments = $commentRepository->findBy(['post' => $post]);
    
    echo "Commentaires du post '" . $post->getTitre() . "' :\n";
    echo "----------------------------------------\n";
    
    if (empty($comments)) {
        echo "Aucun commentaire trouvé pour ce post.\n";
    } else {
        foreach ($comments as $comment) {
            echo "ID: " . $comment->getId() . "\n";
            echo "Auteur: " . $comment->getAuteur() . "\n";
            echo "Date: " . $comment->getCreatedAt()->format('Y-m-d H:i:s') . "\n";
            echo "Contenu: " . $comment->getContenu() . "\n";
            echo "----------------------------------------\n";
        }
        echo "Total: " . count($comments) . " commentaire(s)\n";
    }
    
} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage() . "\n";
} 