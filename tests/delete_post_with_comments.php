<?php

require_once __DIR__ . '/../config/bootstrap.php';

use App\Entity\OneToMany\Unidirectionnelle\Post;
use App\Entity\OneToMany\Unidirectionnelle\Comment;

try {
    // ID du post à supprimer
    $postId = 1; // Vous pouvez modifier cet ID selon vos besoins

    // Récupérer le post
    $post = $entityManager->find(Post::class, $postId);

    if (!$post) {
        throw new Exception("Aucun post trouvé avec l'ID $postId");
    }

    // Récupérer les commentaires associés au post
    $comments = $entityManager->getRepository(Comment::class)->findBy(['post' => $post]);

    // Supprimer chaque commentaire
    foreach ($comments as $comment) {
        $entityManager->remove($comment);
    }

    // Supprimer le post
    $entityManager->remove($post);
    $entityManager->flush();

    echo "Post et ses commentaires supprimés avec succès.\n";

} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage() . "\n";
} 