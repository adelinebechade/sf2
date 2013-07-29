<?php

namespace Proximit\Bundle\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Proximit\Bundle\MediaBundle\Validator\Constraints as MyAssert;

/**
 * Dvd
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proximit\Bundle\MediaBundle\Entity\DvdRepository")
 */
class Dvd
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="date")
     * @MyAssert\LessThanToday
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     * @Assert\Length(
     *     min="30", 
     *     minMessage="Votre resume doit faire au moins {{ limit }} caractères"
     * )
     */
    private $resume;

    /**
     * @var ProximitMediaBundle:Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"})
     * @ORM\JoinColumn(name="realisateur_id", referencedColumnName="id")
     * @Assert\Type(type="Proximit\Bundle\MediaBundle\Entity\Personne")
     */
    private $realisateur;

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
     * Set titre
     *
     * @param string $titre
     * @return Dvd
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     * @return Dvd
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    
        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Dvd
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    
        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set realisateur
     *
     * @param \Proximit\Bundle\MediaBundle\Entity\Personne $realisateur
     * @return Dvd
     */
    public function setRealisateur(\Proximit\Bundle\MediaBundle\Entity\Personne $realisateur = null)
    {
        $this->realisateur = $realisateur;
    
        return $this;
    }

    /**
     * Get realisateur
     *
     * @return \Proximit\Bundle\MediaBundle\Entity\Personne 
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }
}