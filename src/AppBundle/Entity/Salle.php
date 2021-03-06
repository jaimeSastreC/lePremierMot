<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalleRepository")
 */
class Salle
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
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=255, unique=true)
     */
    private $nomSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_salle", type="string", length=255)
     */
    private $villeSalle;

    /**
     * @var int
     *
     * @ORM\Column(name="places_salle", type="smallint", nullable=true)
     */
    private $placesSalle;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Spectacle", mappedBy="salle")
     */
    private $spectacle;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude_salle", type="float", nullable=true)
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude_salle", type="float", nullable=true)
     */
    private $latitude;

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
     * Set nomSalle
     *
     * @param string $nomSalle
     *
     * @return Salle
     */
    public function setNomSalle($nomSalle)
    {
        $this->nomSalle = $nomSalle;

        return $this;
    }

    /**
     * Get nomSalle
     *
     * @return string
     */
    public function getNomSalle()
    {
        return $this->nomSalle;
    }

    /**
     * Set villeSalle
     *
     * @param string $villeSalle
     *
     * @return Salle
     */
    public function setVilleSalle($villeSalle)
    {
        $this->villeSalle = $villeSalle;

        return $this;
    }

    /**
     * Get villeSalle
     *
     * @return string
     */
    public function getVilleSalle()
    {
        return $this->villeSalle;
    }

    /**
     * Set placesSalle
     *
     * @param integer $placesSalle
     *
     * @return Salle
     */
    public function setPlacesSalle($placesSalle)
    {
        $this->placesSalle = $placesSalle;

        return $this;
    }

    /**
     * Get placesSalle
     *
     * @return int
     */
    public function getPlacesSalle()
    {
        return $this->placesSalle;
    }

    /**
     * @return string
     */
    public function getSpectacle()
    {
        return $this->spectacle;
    }

    /**
     * @param string $spectacle
     */
    public function setSpectacle($spectacle)
    {
        $this->spectacle = $spectacle;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude( $latitude)
    {
        $this->latitude = $latitude;
    }


}

