<?php

namespace App\Entity;

use App\Repository\StuffRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StuffRepository::class)
 */
class Stuff
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weapons;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $armors;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $consumables;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gold;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $jewels;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $keyItem;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $potions;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, inversedBy="stuff", cascade={"persist", "remove"})
     */
    private $idCharacter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeapons(): ?string
    {
        return $this->weapons;
    }

    public function setWeapons(?string $weapons): self
    {
        $this->weapons = $weapons;

        return $this;
    }

    public function getArmors(): ?string
    {
        return $this->armors;
    }

    public function setArmors(?string $armors): self
    {
        $this->armors = $armors;

        return $this;
    }

    public function getConsumables(): ?string
    {
        return $this->consumables;
    }

    public function setConsumables(?string $consumables): self
    {
        $this->consumables = $consumables;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(?int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getJewels(): ?string
    {
        return $this->jewels;
    }

    public function setJewels(?string $jewels): self
    {
        $this->jewels = $jewels;

        return $this;
    }

    public function getKeyItem(): ?string
    {
        return $this->keyItem;
    }

    public function setKeyItem(?string $keyItem): self
    {
        $this->keyItem = $keyItem;

        return $this;
    }

    public function getPotions(): ?string
    {
        return $this->potions;
    }

    public function setPotions(?string $potions): self
    {
        $this->potions = $potions;

        return $this;
    }

    public function getOthers(): ?string
    {
        return $this->others;
    }

    public function setOthers(?string $others): self
    {
        $this->others = $others;

        return $this;
    }

    public function getIdCharacter(): ?Character
    {
        return $this->idCharacter;
    }

    public function setIdCharacter(?Character $idCharacter): self
    {
        $this->idCharacter = $idCharacter;

        return $this;
    }
}
