<?php
class User
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private array $roles = [];
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function setId(int $id) : static
    {
        $this->id = $id;

        return $this;
    }
    public function setNom(string $nom) :static
    {
        $this->nom = $nom;
        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

}