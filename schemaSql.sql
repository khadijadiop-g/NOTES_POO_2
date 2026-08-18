CREATE TABLE roles(
    id SERIAL PRIMARY KEY,
    nom_role VARCHAR(50)  NOT NULL UNIQUE
);

CREATE TABLE etablissements(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50)  NOT NULL
);
CREATE TABLE superviseurs(
    id SERIAL PRIMARY KEY,
    nom_sup VARCHAR(50) NOT NULL ,
    prenom  VARCHAR(50) NOT NULL,
    email   VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe  VARCHAR(50) NOT NULL, 
    id_role INT,
    Foreign Key (id_role) REFERENCES roles(id)
);

CREATE TABLE eleves(
    id SERIAL PRIMARY KEY,
    nom_eleve VARCHAR(50)  NOT NULL,
    prenom_eleve VARCHAR(50)  NOT NULL,
    matricule VARCHAR (50) UNIQUE,
    date_naissance DATE NOT NULL,
    id_tuteur INT,
    Foreign Key (id_tuteur) REFERENCES tuteurs(id)

);

CREATE TABLE classes(
    id SERIAL PRIMARY KEY,
    nom_class VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE annee_scolaire(
    id SERIAL PRIMARY KEY,
    debut DATE,
    fin DATE,
    est_active INT DEFAULT 0,
    CHECK (fin > debut)
);
CREATE TABLE statutInscription(
    id SERIAL PRIMARY KEY,
    nom_statut VARCHAR(50)
);
CREATE TABLE inscriptions (
    id SERIAL PRIMARY KEY,
    id_eleve INT ,
    id_classe INT,
    id_annee INT,
    id_etablis INT,
    id_statut INT,
    date_inscription DATE,
    Foreign Key (id_classe) REFERENCES classes(id),
    Foreign Key (id_eleve) REFERENCES eleves(id),
    Foreign Key (id_etablis) REFERENCES etablissements(id),
    Foreign Key (id_annee) REFERENCES annee_scolaire(id),
    Foreign Key (id_statut) REFERENCES statutInscription(id)

);


 CREATE TABLE tranferts(
    id SERIAL PRIMARY KEY,
    id_inscription INT,
    date_transfert DATE ,
    type_transfert VARCHAR(50)CHECK(type_transfert IN('Entrant','Sortant')),
    Foreign Key (id_inscription) REFERENCES inscriptions(id)
 );

 CREATE TABLE tuteurs(
    id SERIAL PRIMARY KEY,
    nom_tuteur VARCHAR(50) NOT NULL,
    prenom_tuteur VARCHAR(50) NOT NULL,
    tel_tuteur VARCHAR(50) NOT NULL
 );

 SELECT e.*,c.nom_class,et.nom,t.*,s.nom_statut FROM eleves e  
 INNER JOIN inscriptions i ON e.id = i.id_eleve
 INNER JOIN classes c ON c.id = i.id_classe 
 INNER JOIN tuteurs t ON t.id = e.id_tuteur 
 INNER JOIN etablissements et ON et.id = i.id_etablis ;