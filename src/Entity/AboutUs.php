<?php

namespace App\Entity;

use App\Repository\AboutUsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutUsRepository::class)]
class AboutUs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $eshtablished;

    #[ORM\Column(type: 'text')]
    private $presentation;

    #[ORM\Column(type: 'string', length: 255)]
    private $members;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEshtablished(): ?string
    {
        return $this->eshtablished;
    }

    public function setEshtablished(string $eshtablished): self
    {
        $this->eshtablished = $eshtablished;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getMembers(): ?string
    {
        return $this->members;
    }

    public function setMembers(string $members): self
    {
        $this->members = $members;

        return $this;
    }
}
