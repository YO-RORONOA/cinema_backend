<?php
require('./config.php');


class film
{
    private $id;
    private $titre;
    private $genre;
    private $duree;
    private $date_sortie;
    private $realisateur;
    private $distribution;

    public function __construct($id, $titre, $genre, $duree, $dsortie, $realisateur, $distribution)
    
    {
        $this-> id = $id;
        $this-> titre = $titre;
        $this-> genre = $genre;
        $this-> duree = $duree;
        $this-> date_sortie = $dsortie;
        $this-> realisateur = $realisateur;
        $this-> distribution = $distribution;
    }


    public function getid()
    {
        return $this->id;
    }

    public function gettitre()
    {
        return $this->titre;

    }
    public function getgenre()
    {
        return $this->genre;

    }
    public function getduree()
    {
        return $this->duree;

    }
    public function getdate_sortie()
    {
        return $this->date_sortie;

    }
    public function getrealisateur()
    {
        return $this->realisateur;

    }

    public function getdistribution()
    {
        return $this->distribution;

    }



}




