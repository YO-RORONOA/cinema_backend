<?php

class FilmManager {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Dependency injection of database connection
    }

    public function addFilm(Film $film) {
        $query = "INSERT INTO film (titre, genre, duree, date_sortie, realisateur, distribution) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssisss", 
            $film->getTitre(), 
            $film->getGenre(), 
            $film->getDuree(), 
            $film->getDateSortie(), 
            $film->getRealisateur(), 
            $film->getDistribution()
        );
        $stmt->execute();
    }

    public function getAllFilms() {
        $query = "SELECT * FROM film";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}


// Database connection
require('./config.php');
$db = new mysqli($host, $username, $password, $database);

// FilmManager instance
$filmManager = new FilmManager($db);

// Administrator instance
$admin = new Administrator(1, "Admin Name", "admin@example.com", "securepassword");

// Film instance
$newFilm = new Film(null, "Inception", "Science Fiction", 148, "2010-07-16", "Christopher Nolan", "Leonardo DiCaprio, Joseph Gordon-Levitt");

// Adding the film
if ($admin->addFilm($filmManager, $newFilm)) {
    echo "Film added successfully!";
} else {
    echo "Failed to add film.";
}

?>


