<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Calendertable
 *
 * @ORM\Table(name="calendertable")
 * @ORM\Entity(repositoryClass = "App\Repository\CalendertableRepository")
 */
class Calendertable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $end ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $start ;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="bacgroundcouleur", type="string", length=255, nullable=false)
     */
    private $bacgroundcouleur;

    /**
     * @var string
     *
     * @ORM\Column(name="bordercouleur", type="string", length=255, nullable=false)
     */
    private $bordercouleur;

    /**
     * @var string
     *
     * @ORM\Column(name="textcouleur", type="string", length=255, nullable=false)
     */
    private $textcouleur;

    public function getId(): ?int
    {
        return $this->id;
    }

  
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart( $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBacgroundcouleur(): ?string
    {
        return $this->bacgroundcouleur;
    }

    public function setBacgroundcouleur(string $bacgroundcouleur): self
    {
        $this->bacgroundcouleur = $bacgroundcouleur;

        return $this;
    }

    public function getBordercouleur(): ?string
    {
        return $this->bordercouleur;
    }

    public function setBordercouleur(string $bordercouleur): self
    {
        $this->bordercouleur = $bordercouleur;

        return $this;
    }

    public function getTextcouleur(): ?string
    {
        return $this->textcouleur;
    }

    public function setTextcouleur(string $textcouleur): self
    {
        $this->textcouleur = $textcouleur;

        return $this;
    }


}
