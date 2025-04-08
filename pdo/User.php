<?php
class User
{
    private $connection;
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $role =null;
    private ?string $password = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function findByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->email = $data['email'];
            $this->role = $data['role'];
            $this->password = $data['password'];
        }
    }
    public function addToDB()
    {
        $stmt = $this->connection->prepare("INSERT INTO users (email, password, role) VALUES ( ?, ?,?)");
        $stmt->execute([ $this->email, $this->password, $this->role]);
        $this->id = $this->connection->lastInsertId();
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
    public function getRole(): ?string
    {
        return $this->role;
    }
    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

}