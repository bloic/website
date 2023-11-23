<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    protected CONST REGEXPATERN = '/<[^>]*>|<script[^>]*>.*?<\/script>/';

    #[Assert\NotBlank(message: 'Ce champs ne peut être vide')]
    #[Assert\Regex(pattern: self::REGEXPATERN,
        message: 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
        match: false)]
    #[ORM\Column(length: 255)]
    private ?string $lastname;

    #[Assert\NotBlank(message: 'Ce champs ne peut être vide')]
    #[Assert\Regex(pattern: self::REGEXPATERN,
        message: 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
        match: false)]
    #[ORM\Column(length: 255)]
    private ?string $firstname;

    #[Assert\NotBlank(message: 'Ce champs ne peut être vide')]
    #[Assert\Email( message: 'l\'adresse email {{ value }} n\'est pas valide.')]
    #[Assert\Regex(pattern: self::REGEXPATERN,
        message: 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
        match: false)]
    #[ORM\Column(length: 255)]
    private ?string $email;

    #[Assert\NotBlank(message: 'Ce champs ne peut être vide')]
    #[Assert\NotNull]
    #[Assert\Regex(pattern: self::REGEXPATERN,
        message: 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
        match: false)]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $message;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function __toString()
    {
        return $this->getMessage();
    }

}
