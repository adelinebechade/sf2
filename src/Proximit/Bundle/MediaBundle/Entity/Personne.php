<?php

namespace Proximit\Bundle\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proximit\Bundle\MediaBundle\Entity\PersonneRepository")
 */
class Personne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255)
     */
    private $nationalite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date")
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuDeNaissance", type="string", length=255)
     */
    private $lieuDeNaissance;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Personne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     * @return Personne
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    
        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     * @return Personne
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    
        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime 
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set lieuDeNaissance
     *
     * @param string $lieuDeNaissance
     * @return Personne
     */
    public function setLieuDeNaissance($lieuDeNaissance)
    {
        $this->lieuDeNaissance = $lieuDeNaissance;
    
        return $this;
    }

    /**
     * Get lieuDeNaissance
     *
     * @return string 
     */
    public function getLieuDeNaissance()
    {
        return $this->lieuDeNaissance;
    }
}