<?php
namespace App\Entity\Sectionks;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Sectionks\MemberRepository")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $fullName;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $lastName;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $firstName;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $middleName;

    private ?Organization $organization;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $certificateSerial;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): self
    {
        $this->middleName = $middleName;

        return $this;
    }

    public function getCertificateSerial(): string
    {
        return $this->certificateSerial;
    }

    public function setCertificateSerial(string $certificateSerial): self
    {
        $this->certificateSerial = $certificateSerial;

        return $this;
    }

    public function getOrganization(): Organization
    {
        return $this->organization;
    }

    public function setOrganization(Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }
}