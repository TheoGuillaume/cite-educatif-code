CREATE OR REPLACE VIEW v_act_struct AS
SELECT * FROM c_acteur_struct WHERE etat = 2;

SELECT ca.id, ca.photo_profil,ca.id_utilisateur, ca.nom,ca.prenom,ca.etat,cs.nom_social,cs.sigle FROM ca_acteur ca
JOIN cs_struct cs on ca.id_structure = cs.id
JOIN c_utilisateur c on ca.id_utilisateur = c.id;

DROP VIEW v_act_struct;

SELECT COUNT(*) from cs_struct;

SELECT COUNT(str.id),id_categorie from cs_struct str
GROUP BY id_categorie;

SELECT COUNT(str.id),id_categorie, cat.nom from cs_struct str
JOIN cs_categorie cat on cat.id=str.id_categorie
GROUP BY id_categorie;

SELECT COUNT(*) from ca_acteur;

ALTER TABLE c_utilisateur ADD nombre_de_passages INT DEFAULT 0;

SELECT SUM(nombre_de_passages) as somme_passages, email
FROM c_utilisateur
ORDER BY somme_passages DESC
LIMIT 5;


-- 23052023


CREATE OR REPLACE VIEW v_act_struct AS
SELECT ca.*, cs.nom_social,cs.sigle FROM c_acteur_struct ca
JOIN cs_struct cs on ca.id_struct = cs.id
WHERE ca.etat = 2;

CREATE OR REPLACE VIEW v_act_struct_user as
select v.id_acteur, v.id_struct,v.nom_social,v.sigle, ca.id,ca.photo_profil,ca.id_utilisateur, ca.nom,ca.prenom,ca.poste,ca.etat from v_act_struct v
RIGHT JOIN ca_acteur ca on ca.id = v.id_acteur; 

CREATE OR REPLACE VIEW structure_categorie AS
SELECT COUNT(str.id) as nbr,cat.nom
FROM cs_struct str
JOIN cs_categorie cat ON cat.id = str.id_categorie
GROUP BY id_categorie

UNION

SELECT COUNT(str.id), 'Aucune'
FROM cs_struct str
WHERE str.id_categorie IS NULL
ORDER BY nbr DESC;

CREATE OR REPLACE VIEW passage_quotidien AS
SELECT COALESCE(SUM(t1.nombre_de_passages), 0) AS somme_passages, t2.email
FROM c_utilisateur t2
LEFT JOIN c_utilisateur t1 ON t1.id = t2.id
GROUP BY t2.id
ORDER BY somme_passages DESC
LIMIT 5;

-- FIN