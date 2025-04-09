<?php
class User
{
    private ?int $id;
    private ?string $nom ;
    private ?string $email ;
    private array $roles = [];
    private ?string $password ;
    public function __construct(?int $id = null, ?string $nom = null, ?string $email = null, array $roles = [], ?string $password = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->roles = $roles;
        $this->password = $password;
    }
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