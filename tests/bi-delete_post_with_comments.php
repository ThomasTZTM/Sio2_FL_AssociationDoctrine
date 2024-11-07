<?php

require_once __DIR__ . '/../config/bootstrap.php';

use App\Entity\OneToMany\Bidirectionnelle\Post;

try {
    // ID du post à supprimer
    $postId = 14; // Vous pouvez modifier cet ID selon vos besoins

    // Récupérer le post
    $post = $entityManager->find(Post::class, $postId);

    if (!$post) {
        throw new Exception("Aucun post trouvé avec l'ID $postId");
    }

    // Supprimer le post (les commentaires associés seront également supprimés grâce au cascade)
    $entityManager->remove($post);
    $entityManager->flush();

    echo "Post et ses commentaires supprimés avec succès.\n";

} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage() . "\n";
} 