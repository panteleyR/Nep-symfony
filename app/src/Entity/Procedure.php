<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProcedureRepository")
 * @ORM\Table(name="procedure_223")
 */
class Procedure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="procedure_223")
     */
    private ?Status $status = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="procedure_223")
     */
    private ?Type $type = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $registrationNumber = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $oosRegistrationNumber = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $placerFullName = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;
        return $this;
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

    public function getRegistrationNumber(): ?string
    {
        return $this->name;
    }

    public function setRegistrationNumber(string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    public function getOosRegistrationNumber(): ?string
    {
        return $this->name;
    }

    public function setOosRegistrationNumber(string $oosRegistrationNumber): self
    {
        $this->oosRegistrationNumber = $oosRegistrationNumber;
        return $this;
    }

    public function getPlacerFullName(): ?string
    {
        return $this->placerFullName;
    }

    public function setPlacerFullName(string $placerFullName): self
    {
        $this->placerFullName = $placerFullName;
        return $this;
    }

}