create or replace view structure_categorie as 
SELECT COUNT(str.id) as nbr,COALESCE(cat.nom,'Aucune categorie') as nom
FROM cs_struct str
LEFT JOIN cs_categorie cat ON cat.id = str.id_categorie
GROUP BY id_categorie;


create table passage_utilisateur(
    id INT AUTO_INCREMENT NOT NULL primary key,
    id_user INT NOT NULL,
    createAt DATE DEFAULT CURRENT_DATE,
    foreign key(id_user) references c_utilisateur(id)
);


SELECT id_user, COUNT(*) AS passage
FROM passage_utilisateur
WHERE WEEK(createAt) = WEEK(CURDATE())
GROUP BY id_user;

CREATE OR REPLACE VIEW passage_hebdo as
SELECT u.email, COUNT(*) AS nombre_utilisateurs
FROM passage_utilisateur pu
JOIN c_utilisateur u ON pu.id_user = u.id
WHERE WEEK(pu.createAt) = WEEK(CURDATE())
GROUP BY pu.id_user;

