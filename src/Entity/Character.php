<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ability;

    /**
     * @ORM\Column(type="integer")
     */
    private $stamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $luck;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $intAbility;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $intStamina;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $intLuck;

    /**
     * @ORM\OneToOne(targetEntity=Stuff::class, mappedBy="idCharacter", cascade={"persist", "remove"})
     */
    private $stuff;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="characterId", cascade={"persist", "remove"})
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbility(): ?int
    {
        return $this->ability;
    }

    public function setAbility(int $ability): self
    {
        $this->ability = $ability;

        return $this;
    }

    public function getStamina(): ?int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getLuck(): ?int
    {
        return $this->luck;
    }

    public function setLuck(int $luck): self
    {
        $this->luck = $luck;

        return $this;
    }

    public function getIntAbility(): ?int
    {
        return $this->intAbility;
    }

    public function setIntAbility(?int $intAbility): self
    {
        $this->intAbility = $intAbility;

        return $this;
    }

    public function getIntStamina(): ?int
    {
        return $this->intStamina;
    }

    public function setIntStamina(?int $intStamina): self
    {
        $this->intStamina = $intStamina;

        return $this;
    }

    public function getIntLuck(): ?int
    {
        return $this->intLuck;
    }

    public function setIntLuck(?int $intLuck): self
    {
        $this->intLuck = $intLuck;

        return $this;
    }

    public function getStuff(): ?Stuff
    {
        return $this->stuff;
    }

    public function setStuff(?Stuff $stuff): self
    {
        // unset the owning side of the relation if necessary
        if ($stuff === null && $this->stuff !== null) {
            $this->stuff->setIdCharacter(null);
        }

        // set the owning side of the relation if necessary
        if ($stuff !== null && $stuff->getIdCharacter() !== $this) {
            $stuff->setIdCharacter($this);
        }

        $this->stuff = $stuff;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
