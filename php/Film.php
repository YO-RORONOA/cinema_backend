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

    
}