<?php

namespace App\Entity\OneToMany\Unidirectionnelle;
use Doctrine\ORM\Mapping as ORM;

// Cette entité Post représente un article de blog.
// Elle est mappée (mise en correspondance) avec la table posts
// ELle doit être configuré afin d'être prise en charge par Doctrine
// // Pour configurer cette entité avec Doctrine, on utilise ce qu'on appelle de attributs (ce sont des annotations) utilisés par Doctrine pour le mapping des entités
#[ORM\Entity]  // Indique à Doctrine que c'est une Entité
#[ORM\Table(name: "posts")]     // Définit le nom de la table à laquelle elle est mappée (associée)
class Post
{
    #[ORM\Id]  // Cet attribut indique que la propriété est la clé primaire de l'entité. Cela signifie que la colonne associée dans la base de données jouera le rôle d'identifiant unique pour chaque ligne de la table.
    #[ORM\Column(name: "id_post", type: "integer")]     // Cet attribut spécifie que cette propriété est mappée à la colonne 'id_post' de la base de données.
    #[ORM\GeneratedValue]   // Cet attribut indique que la valeur de cet identifiant est générée automatiquement par la base de données, généralement via un auto-incrément. Doctrine attend donc que la base de données attribue une valeur à cette colonne lors de l'insertion d'une nouvelle ligne.
    private int $id;
    #[ORM\Column(name: "titre_post",type: "string",length: 200, nullable: false) ]  // Cet attribut spécifie que cette propriété est mappée à la colonne 'titre_post' de la base de données.
    private string $titre;
    #[ORM\Column(name: "contenu_post", type: "text",nullable: false )]  // // Cet attribut spécifie que cette propriété est mappée à la colonne 'contenu_post' de la base de données.
    private string $contenu;
    #[ORM\Column(name: "date_creation_post", type: "datetime", nullable: false)]    // Cet attribut spécifie que cette propriété est mappée à la colonne 'date_creation_post' de la base de données.
    private \DateTime $createdAt;
    #[ORM\Column(name: "nb_likes_post", type:'integer')]    // Cet attribut spécifie que cette propriété est mappée à la colonne 'nb_likes_post' de la base de données.
    private int $nbLikes;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getNbLikes(): int
    {
        return $this->nbLikes;
    }

    public function setNbLikes(int $nbLikes): void
    {
        $this->nbLikes = $nbLikes;
    }
}