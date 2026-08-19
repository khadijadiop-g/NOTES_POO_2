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


ALTER TABLE inscriptions ADD COLUMN id_super INT;
ALTER TABLE inscriptions ADD CONSTRAINT fk_super FOREIGN KEY (id_super) REFERENCES superviseurs(id);
SELECT e.prenom_eleve,e.nom_eleve,e.id AS eleve_id ,e.matricule,e.date_naissance,c.id AS classe_id,c.nom_class,
 et.id AS etablis_id,et.nom,t.prenom_tuteur,t.nom_tuteur,t.tel_tuteur,t.id AS tuteur_id,s.nom_statut,s.id AS statut_id,
 CASE 
 WHEN i.id_statut = 1 THEN 'inscrit'
 WHEN i.id_statut = 2 THEN 'attente'
 ELSE 'non'
 END AS color
 FROM eleves e  
 INNER JOIN inscriptions i ON e.id = i.id_eleve
 INNER JOIN statutinscription s ON s.id = i.id_statut
 INNER JOIN classes c ON c.id = i.id_classe 
 INNER JOIN tuteurs t ON t.id = e.id_tuteur 
 INNER JOIN etablissements et ON et.id = i.id_etablis 
 WHERE id_annee=1 ;

 SELECT e.prenom_eleve,e.nom_eleve,e.id AS eleve_id ,e.matricule,e.date_naissance,c.id AS classe_id,c.nom_class,
 et.id AS etablis_id,et.nom,t.prenom_tuteur,t.nom_tuteur,t.tel_tuteur,t.id AS tuteur_id,s.nom_statut,s.id AS statut_id,
 CASE 
 WHEN i.id_statut = 1 THEN 'inscrit'
 WHEN i.id_statut = 2 THEN 'attente'
 ELSE 'non'
 END AS color
 FROM eleves e  
 INNER JOIN inscriptions i ON e.id = i.id_eleve
 INNER JOIN statutinscription s ON s.id = i.id_statut
 INNER JOIN classes c ON c.id = i.id_classe 
 INNER JOIN tuteurs t ON t.id = e.id_tuteur 
 INNER JOIN etablissements et ON et.id = i.id_etablis 
 WHERE id_annee=1 
 AND i.id_classe=1
 AND
 i.id_statut=1
 ;


 -- 1) Rôle
INSERT INTO roles ( nom_role)
VALUES ( 'Superviseur');

-- 2) Établissement
INSERT INTO etablissements (nom)
VALUES ('Al AMal');


-- 3) Tuteurs
INSERT INTO tuteurs ( nom_tuteur, prenom_tuteur, tel_tuteur) VALUES
( 'Diallo', 'Mamadou', '771234567'),
( 'Sarr', 'Awa', '772345678'),
( 'Ndiaye', 'Pape', '773456789'),
( 'Diop', 'Fatou', '774567890'),
( 'Ba', 'Omar', '775678901');


-- 4) Classes
INSERT INTO classes ( nom_class) VALUES
( '6eme A'),
( '5eme B'),
( '4eme A');


-- 5) Année scolaire
INSERT INTO annee_scolaire ( debut, fin, est_active) VALUES
( '2025-09-01', '2026-06-30', 1);


-- 6) Statuts inscription
INSERT INTO statutInscription ( nom_statut) VALUES
( 'Incrit'),
( 'En attente'),
( 'Non affecte');


-- 7) Un seul superviseur
INSERT INTO superviseurs ( nom_sup, prenom, email, mot_de_passe, id_role) VALUES
( 'Kouassi', 'Amina', 'amina@ecole.sn', 'secret123', 1);


-- 8) Plusieurs élèves liés à des tuteurs
INSERT INTO eleves ( nom_eleve, prenom_eleve, matricule, date_naissance, id_tuteur) VALUES
( 'Sow', 'Ibrahima', 'ELEVE-001', '2014-05-10', 1),
( 'Ndiaye', 'Salimata', 'ELEVE-002', '2014-02-18', 2),
( 'Diop', 'Moussa', 'ELEVE-003', '2013-11-25', 3),
( 'Ba', 'Aissatou', 'ELEVE-004', '2014-07-30', 2),
( 'Fall', 'Cheikh', 'ELEVE-005', '2013-09-12', 5),
( 'Mbaye', 'Ndeye', 'ELEVE-006', '2014-04-08', 1);

INSERT INTO eleves ( nom_eleve, prenom_eleve, matricule, date_naissance, id_tuteur) VALUES
( 'Wane', 'Baila', 'ELEVE-007', '2018-05-10', 4);
INSERT INTO inscriptions ( id_eleve, id_classe, id_annee, id_etablis, id_statut, date_inscription, id_super) VALUES
( 7, 1, 1, 1, 3, '2025-10-05', 1);

-- 9) Inscriptions de tous ces élèves
INSERT INTO inscriptions ( id_eleve, id_classe, id_annee, id_etablis, id_statut, date_inscription, id_super) VALUES
( 1, 1, 1, 1, 1, '2025-09-05', 1),
( 2, 1, 1, 1, 1, '2025-09-06', 1),
( 3, 2, 1, 1, 1, '2025-09-07', 1),
( 4, 2, 1, 1, 2, '2025-09-08', 1),
( 5, 3, 1, 1, 1, '2025-09-09', 1),
( 6, 3, 1, 1, 2, '2025-09-10', 1);

SELECT * FROM eleves;
SELECT * FROM statutinscription;
SELECT * FROM classes;


SELECT e.prenom_eleve,e.nom_eleve,e.id AS eleve_id ,e.matricule,e.date_naissance,c.id AS classe_id,c.nom_class,
 et.id AS etablis_id,et.nom,t.prenom_tuteur,t.nom_tuteur,t.tel_tuteur,t.id AS tuteur_id,s.nom_statut,s.id AS statut_id
  FROM eleves e  
 INNER JOIN inscriptions i ON e.id = i.id_eleve
 INNER JOIN statutinscription s ON s.id = i.id_statut
 INNER JOIN classes c ON c.id = i.id_classe 
 INNER JOIN tuteurs t ON t.id = e.id_tuteur 
 INNER JOIN etablissements et ON et.id = i.id_etablis 
 WHERE i.id_annee = :id_annee
 AND (:id_classe = 0 OR i.id_classe = :id_classe)
 AND (:id_statut = 0 OR i.id_statut = :id_statut)
 AND (:recherche = '' OR e.nom_eleve ILIKE :recherche_like OR e.prenom_eleve ILIKE :recherche_like OR e.matricule ILIKE :recherche_like)
 ORDER BY e.nom_eleve, e.prenom_eleve
 LIMIT :limit OFFSET :offset;


 SELECT COUNT(*) AS total
 FROM inscriptions i
 INNER JOIN eleves e ON e.id = i.id_eleve
 WHERE i.id_annee = :id_annee
 AND (:id_classe = 0 OR i.id_classe = :id_classe)
 AND (:id_statut = 0 OR i.id_statut = :id_statut)
 AND (:recherche = '' OR e.nom_eleve ILIKE :recherche_like OR e.prenom_eleve ILIKE :recherche_like OR e.matricule ILIKE :recherche_like);

  SELECT s.*,r.* FROM superviseurs s 
 INNER JOIN roles r ON s.id_role = r.id 
 WHERE email = :email