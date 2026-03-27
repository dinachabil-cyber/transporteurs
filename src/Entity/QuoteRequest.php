<?php

namespace App\Entity;

use App\Repository\QuoteRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuoteRequestRepository::class)]
#[ORM\Table(name: 'quote_requests')]
#[ORM\HasLifecycleCallbacks]
class QuoteRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $firstname;

    #[ORM\Column(type: 'string', length: 100)]
    private string $lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $startActivity = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $insuredCurrently = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $previousResiliation = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $resiliationMotif = null;

    #[ORM\Column(type: 'string', length: 20)]
    private string $postcode;

    #[ORM\Column(type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(type: 'string', length: 30)]
    private string $phone;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function getStartActivity(): ?bool
    {
        return $this->startActivity;
    }

    public function setStartActivity(?bool $startActivity): self
    {
        $this->startActivity = $startActivity;
        return $this;
    }

    public function getInsuredCurrently(): ?bool
    {
        return $this->insuredCurrently;
    }

    public function setInsuredCurrently(?bool $insuredCurrently): self
    {
        $this->insuredCurrently = $insuredCurrently;
        return $this;
    }

    public function getPreviousResiliation(): ?string
    {
        return $this->previousResiliation;
    }

    public function setPreviousResiliation(?string $previousResiliation): self
    {
        $this->previousResiliation = $previousResiliation;
        return $this;
    }

    public function getResiliationMotif(): ?string
    {
        return $this->resiliationMotif;
    }

    public function setResiliationMotif(?string $resiliationMotif): self
    {
        $this->resiliationMotif = $resiliationMotif;
        return $this;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
