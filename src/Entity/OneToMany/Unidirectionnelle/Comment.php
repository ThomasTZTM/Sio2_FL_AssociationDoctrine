<?php

namespace App\Entity\OneToMany\Unidirectionnelle;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "comments")]
class Comment
{
    #[ORM\Id]
    #[ORM\Column(name: "id_comment", type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "date_creation_comment", type: "datetime", nullable: false)]
    private \DateTime $createdAt;

    #[ORM\Column(name: "auteur_comment", type: "string", length: 100, nullable: false)]
    private string $auteur;

    #[ORM\Column(name: "contenu_comment", type: "text", nullable: false)]
    private string $contenu;

    #[ORM\ManyToOne(targetEntity: Post::class)]
    #[ORM\JoinColumn(name: "post_id", referencedColumnName: "id_post", nullable: false)]
    private Post $post;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }
} 