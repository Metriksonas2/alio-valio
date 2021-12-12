<?php

namespace App\Entity;

use App\Repository\ScooterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScooterRepository::class)
 */
class Scooter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateOfManufacture;

    /**
     * @ORM\Column(type="integer")
     */
    private $batteryCapacity;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxDistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $batteryChargeTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxWeight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasScreen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasLight;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $partType;

    /**
     * @ORM\OneToOne(targetEntity=Ad::class, mappedBy="scooter", cascade={"persist", "remove"})
     */
    private $ad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getDateOfManufacture(): ?\DateTimeInterface
    {
        return $this->dateOfManufacture;
    }

    public function setDateOfManufacture(\DateTimeInterface $dateOfManufacture): self
    {
        $this->dateOfManufacture = $dateOfManufacture;

        return $this;
    }

    public function getBatteryCapacity(): ?int
    {
        return $this->batteryCapacity;
    }

    public function setBatteryCapacity(int $batteryCapacity): self
    {
        $this->batteryCapacity = $batteryCapacity;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(int $maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getMaxDistance(): ?int
    {
        return $this->maxDistance;
    }

    public function setMaxDistance(int $maxDistance): self
    {
        $this->maxDistance = $maxDistance;

        return $this;
    }

    public function getBatteryChargeTime(): ?int
    {
        return $this->batteryChargeTime;
    }

    public function setBatteryChargeTime(int $batteryChargeTime): self
    {
        $this->batteryChargeTime = $batteryChargeTime;

        return $this;
    }

    public function getMaxWeight(): ?int
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(int $maxWeight): self
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getHasScreen(): ?bool
    {
        return $this->hasScreen;
    }

    public function setHasScreen(bool $hasScreen): self
    {
        $this->hasScreen = $hasScreen;

        return $this;
    }

    public function getHasLight(): ?bool
    {
        return $this->hasLight;
    }

    public function setHasLight(bool $hasLight): self
    {
        $this->hasLight = $hasLight;

        return $this;
    }

    public function getIsPart(): ?bool
    {
        return $this->isPart;
    }

    public function setIsPart(bool $isPart): self
    {
        $this->isPart = $isPart;

        return $this;
    }

    public function getPartType(): ?string
    {
        return $this->partType;
    }

    public function setPartType(?string $partType): self
    {
        $this->partType = $partType;

        return $this;
    }

    public function getAd(): ?Ad
    {
        return $this->ad;
    }

    public function setAd(Ad $ad): self
    {
        // set the owning side of the relation if necessary
        if ($ad->getScooter() !== $this) {
            $ad->setScooter($this);
        }

        $this->ad = $ad;

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
}
