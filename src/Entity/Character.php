<?php

namespace POE\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="POE\Repository\CharacterRepository")
 * @ORM\Table(name="characters")
 */
class Character
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="life_max" , options={"unsigned"=true})
     */
    private $maxLife;

    /**
     * @ORM\Column(type="integer", name="life_current" , options={"unsigned"=true})
     */
    private $currentLife;

    /**
     * @ORM\Column(type="integer", name="energy_max" , options={"unsigned"=true})
     */
    private $maxEnergy;

    /**
     * @ORM\Column(type="integer", name="energy_current" , options={"unsigned"=true})
     */
    private $currentEnergy;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $attack;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $defense;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaxLife(): ?int
    {
        return $this->maxLife;
    }

    public function setMaxLife(int $maxLife): self
    {
        $this->maxLife = $maxLife;

        return $this;
    }

    public function getCurrentLife(): ?int
    {
        return $this->currentLife;
    }

    public function setCurrentLife(int $currentLife): self
    {
        $this->currentLife = $currentLife;

        return $this;
    }

    public function getMaxEnergy(): ?int
    {
        return $this->maxEnergy;
    }

    public function setMaxEnergy(int $maxEnergy): self
    {
        $this->maxEnergy = $maxEnergy;

        return $this;
    }

    public function getCurrentEnergy(): ?int
    {
        return $this->currentEnergy;
    }

    public function setCurrentEnergy(int $currentEnergy): self
    {
        $this->currentEnergy = $currentEnergy;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function wound($attack)
    {
        $this->currentLife -= $attack;
    }
}
