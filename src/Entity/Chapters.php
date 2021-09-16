<?php

namespace App\Entity;

use App\Repository\ChaptersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChaptersRepository::class)
 */
class Chapters
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
    private $number;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $outWays;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $testLuck;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getOutWays(): ?string
    {
        return $this->outWays;
    }

    public function setOutWays(?string $outWays): self
    {
        $this->outWays = $outWays;

        return $this;
    }

    public function getTestLuck(): ?bool
    {
        return $this->testLuck;
    }

    public function setTestLuck(?bool $testLuck): self
    {
        $this->testLuck = $testLuck;

        return $this;
    }

    public function getFight(): ?bool
    {
        return $this->fight;
    }

    public function setFight(?bool $fight): self
    {
        $this->fight = $fight;

        return $this;
    }
}
