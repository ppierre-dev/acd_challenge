<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass:EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length : 255)]
private ?string $nom = null;

#[ORM\Column(length : 255)]
private ?string $adresse = null;

#[ORM\Column(length : 5)]
private ?string $code_postal = null;

#[ORM\Column(length : 255)]
private ?string $ville = null;

#[ORM\OneToMany(mappedBy : 'etablissement_id', targetEntity:User::class)]
private Collection $users;

public function __construct()
    {
    $this->users = new ArrayCollection();
}

function getId(): ?int
    {
    return $this->id;
}

function getNom(): ?string
    {
    return $this->nom;
}

function setNom(string $nom): self
    {
    $this->nom = $nom;

    return $this;
}

function getAdresse(): ?string
    {
    return $this->adresse;
}

function setAdresse(string $adresse): self
    {
    $this->adresse = $adresse;

    return $this;
}

function getCodePostal(): ?string
    {
    return $this->code_postal;
}

function setCodePostal(string $code_postal): self
    {
    $this->code_postal = $code_postal;

    return $this;
}

function getVille(): ?string
    {
    return $this->ville;
}

function setVille(string $ville): self
    {
    $this->ville = $ville;

    return $this;
}

/**
 * @return Collection<int, User>
 */
function getUsers(): Collection
    {
    return $this->users;
}

function addUser(User $user): self
    {
    if (!$this->users->contains($user)) {
        $this->users->add($user);
        $user->setEtablissementId($this);
    }

    return $this;
}

function removeUser(User $user): self
    {
    if ($this->users->removeElement($user)) {
        // set the owning side to null (unless already changed)
        if ($user->getEtablissementId() === $this) {
            $user->setEtablissementId(null);
        }
    }

    return $this;
}
}
