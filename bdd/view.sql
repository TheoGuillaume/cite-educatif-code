CREATE OR REPLACE VIEW v_cs_stru_user_cat AS
SELECT cs.id, cs.id_utilisateur,c.email,cs.id_categorie,ca.nom as nomcategorie,cs.nom_social,cs.siren,cs.email_siege,cs.photo_logo,cs.etat FROM cs_struct cs
JOIN c_utilisateur c on cs.id_utilisateur = c.id
JOIN cs_categorie ca on cs.id_categorie = ca.id;


CREATE OR REPLACE VIEW v_act_struct_user AS
SELECT ca.id, ca.photo_profil,ca.id_utilisateur, ca.nom,ca.prenom,ca.etat,cs.nom_social,cs.sigle FROM ca_acteur ca
JOIN cs_struct cs on ca.id_structure = cs.id
JOIN c_utilisateur c on ca.id_utilisateur = c.id;

SELECT COUNT(*) from cs_struct;

SELECT COUNT(id),id_categorie from cs_struct
GROUP BY id_categorie;

SELECT COUNT(*) from ca_acteur;

ALTER TABLE c_utilisateur ADD nombre_de_passages INT DEFAULT 0;

SELECT COALESCE(SUM(nombre_de_passages),0) as somme_passages, id FROM c_utilisateur
ORDER BY somme_passages DESC
LIMIT 5;

SELECT COALESCE(SUM(t1.nombre_de_passages), 0) AS somme_passages, t2.id
FROM c_utilisateur t2
LEFT JOIN c_utilisateur t1 ON t1.id = t2.id
GROUP BY t2.id
ORDER BY somme_passages DESC
LIMIT 5;

CREATE OR REPLACE VIEW v_cs_struct_categorie as SELECT cs_struct.*, cs_categorie.image_cat from  cs_struct JOIN cs_categorie on 
 cs_struct.id_categorie = cs_categorie.id where cs_struct.etat = '1';


CREATE OR REPLACE VIEW v_cs_struct_notification as  SELECT cs_struct.id,cs_struct.nom_social,cs_struct.id_utilisateur,cs_struct.photo_logo,
c_notification.id_envoyeur,c_notification.id_recepteur,c_notification.lu,
c_notification.id as id_notification FROM cs_struct JOIN c_notification on 
cs_struct.id_utilisateur = c_notification.id_envoyeur;

CREATE or REPLACE VIEW v_demande_confimer_struct as 
SELECT v_cs_struct_notification.*,c_acteur_struct.id_acteur,c_acteur_struct.id_struct,
c_acteur_struct.etat,c_acteur_struct.id as id_demande FROM v_cs_struct_notification join c_acteur_struct on 
v_cs_struct_notification.id = c_acteur_struct.id_struct WHERE c_acteur_struct.etat = 2 GROUP by v_cs_struct_notification.id_notification
