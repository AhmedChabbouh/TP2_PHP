<?php

class Section
{
    private ?int $id = null;
    private ?string $designation = null;
    private ?string $description = null;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }
    public function getDesignation(): ?string
    {
        return $this->designation;
    }
    public function setDesignation(string $designation) : static
    {
        $this->designation = $designation;
        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }
}