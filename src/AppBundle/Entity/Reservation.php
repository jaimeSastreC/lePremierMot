<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="date")
     * TODO vérifier que date soit avant ou égal à spectacle @Assert\LessThanOrEqual("today")
     */
    private $dateReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_reservation", type="decimal", precision=7, scale=2)
     */
    private $montantReservation;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Spectacle", inversedBy="reservation")
     */
    private $spectacle;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="reservation")
     */
    private $client;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Spectateur", cascade={"persist"})
     */
    private $spectateur;

    //***************************************Getter Setter*************************************************


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set montantReservation
     *
     * @param string $montantReservation
     *
     * @return Reservation
     */
    public function setMontantReservation($montantReservation)
    {
        $this->montantReservation = $montantReservation;

        return $this;
    }

    /**
     * Get montantReservation
     *
     * @return string
     */
    public function getMontantReservation()
    {
        return $this->montantReservation;
    }

    /**
     * @return mixed
     */
    public function getSpectacle()
    {
        return $this->spectacle;
    }

    /**
     * @param mixed $spectacle
     */
    public function setSpectacle($spectacle)
    {
        $this->spectacle = $spectacle;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getSpectateur()
    {
        return $this->spectateur;
    }

    /**
     * @param mixed $spectateur
     */
    public function setSpectateur($spectateur)
    {
        $this->spectateur = $spectateur;
    }



}

