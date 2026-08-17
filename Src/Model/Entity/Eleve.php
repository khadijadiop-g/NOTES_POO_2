   id SERIAL PRIMARY KEY,
    nom_eleve VARCHAR(50)  NOT NULL,
    prenom_eleve VARCHAR(50)  NOT NULL,
    matricule VARCHAR (50) UNIQUE,
    date_naissance DATE NOT NULL,
    prenom_tuteur VARCHAR(50)  NOT NULL,
    tel_tuteur VARCHAR(50)  NOT NULL

<?php

class Eleve{
private ?int $id;
private string $nom_eleve;
private string $prenom_eleve;
private string $matricule;
private DateTime $date_naissance;
private string $prenom_tuteur;
private string $tel_tuteur;




}