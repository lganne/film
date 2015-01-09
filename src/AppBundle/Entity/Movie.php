<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\MovieRepository")
 */
class Movie
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
     * @ORM\Column(name="imbdid", type="string", length=20)
     */
    private $imbdid;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="decimal",precision=2, scale=1)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="votes", type="integer")
     */
    private $votes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sortie", type="date",nullable=true)
     */
    private $sortie;

    /**
     * @var string
     *
     * @ORM\Column(name="genres", type="string", length=255)
     */
    private $genres;

    /**
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=255,nullable=true)
     */
    private $realisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="scenariste", type="string", length=255,nullable=true)
     */
    private $scenariste;

    /**
     * @var string
     *
     * @ORM\Column(name="acteurs", type="string", length=255, nullable=true)
     */
    private $acteurs;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text",nullable=true)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="paysRealisation", type="string", length=255,nullable=true)
     */
    private $paysRealisation;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAffiche", type="text")
     */
    private $urlAffiche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="datetime")
     */
    private $dateModif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;


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
     * Set imbdid
     *
     * @param string $imbdid
     * @return Movie
     */
    public function setImbdid($imbdid)
    {
        $this->imbdid = $imbdid;

        return $this;
    }

    /**
     * Get imbdid
     *
     * @return string 
     */
    public function getImbdid()
    {
        return $this->imbdid;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Movie
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
     * @param integer $annee
     * @return Movie
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Movie
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set votes
     *
     * @param integer $votes
     * @return Movie
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return integer 
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set sortie
     *
     * @param \DateTime $sortie
     * @return Movie
     */
    public function setSortie($sortie)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie
     *
     * @return \DateTime 
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * Set genres
     *
     * @param string $genres
     * @return Movie
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get genres
     *
     * @return string 
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     * @return Movie
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return string 
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set scenariste
     *
     * @param string $scenariste
     * @return Movie
     */
    public function setScenariste($scenariste)
    {
        $this->scenariste = $scenariste;

        return $this;
    }

    /**
     * Get scenariste
     *
     * @return string 
     */
    public function getScenariste()
    {
        return $this->scenariste;
    }

    /**
     * Set acteurs
     *
     * @param string $acteurs
     * @return Movie
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    /**
     * Get acteurs
     *
     * @return string 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Movie
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
     * Set paysRealisation
     *
     * @param string $paysRealisation
     * @return Movie
     */
    public function setPaysRealisation($paysRealisation)
    {
        $this->paysRealisation = $paysRealisation;

        return $this;
    }

    /**
     * Get paysRealisation
     *
     * @return string 
     */
    public function getPaysRealisation()
    {
        return $this->paysRealisation;
    }

    /**
     * Set urlAffiche
     *
     * @param string $urlAffiche
     * @return Movie
     */
    public function setUrlAffiche($urlAffiche)
    {
        $this->urlAffiche = $urlAffiche;

        return $this;
    }

    /**
     * Get urlAffiche
     *
     * @return string 
     */
    public function getUrlAffiche()
    {
        return $this->urlAffiche;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     * @return Movie
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime 
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Movie
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}
