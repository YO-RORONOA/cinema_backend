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


class adminstrator
{
    private $id;
    private $name;
    private $email;
    private $password;


    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function addFilm(FilmManager $filmManager, Film $film)
    {
        return $filmManager->addFilm($film);
    }
    public function editFilm(FilmManager $filmManager, Film $film)
    {
        return $filmManager->editFilm($film);
    }

}



class filmManager
{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addFilm(film $film)
    {
        $query = "INSERT INTO film (titre, genre, duree, date_sortie, realisateur, distribution) 
                  VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $this->conn->prepare($query);

                    $stmt->bind_param(
                        "ssisss", 
                        $film->gettitre(),
                        $film->getgenre(),
                        $film->getduree(),
                        $film->getdate_sortie(),
                        $film->getrealisateur(),
                        $film->getdistribution()
                    );
                    return $stmt->execute();
    }

    public function editFilm(film $film)
    {
        $query = "UPDATE film
                 set titre = ?, genre= ?, duree= ?, date_sortie = ?, realisateur = ?, distribution = ? where id= ?";
        $stmt= $this->conn->prepare($query);
        $stmt->bind_param(
            "ssisssi",
            $film->gettitre(),
            $film->getgenre(),
            $film->getduree(),
            $film->getdate_sortie(), 
            $film->getrealisateur(),   
            $film->getdistribution(),  
            $film->getid()             
    );
    return $stmt->execute();
    }
}

$db = new database();
$conn = $db->connect();
$filmManager = new filmManager($conn);

$admin = new adminstrator(1, "Admin Name", "admin@example.com", "securepassword");
// $newFilm = new Film(null, "Inception", "Science Fiction", 148, "2010-07-16", "Christopher Nolan", "Leonardo DiCaprio, Joseph Gordon-Levitt");
// if ($admin->addFilm($filmManager, $newFilm)) {
//     echo "Film added successfully!";
// } else {
//     echo "Failed to add film.";
// }


$editedfilm = new film(3, "Inceptionnn", "action", 148, "2010-07-16", "Christopher Nolan", 
"Leonardo DiCaprio", "Joseph Gordon-Levitt");
if ($admin->editFilm($filmManager, $editedfilm)) {
    echo "Film updated successfully!";
} else {
    echo "Failed to update film.";
}