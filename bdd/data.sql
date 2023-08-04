-- INSERT INTO cs_horaire
-- (id, nom, etat)
-- VALUES(-1, 'Matin', 1);
-- INSERT INTO cs_horaire
-- (id, nom, etat)
-- VALUES(-2, 'Midi', 1);
-- INSERT INTO cs_horaire
-- (id, nom, etat)
-- VALUES(-3, 'Soir', 1);

-- INSERT INTO cs_jour (id, nom, etat) VALUES(-1, 'Lundi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-2, 'Mardi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-3, 'Mecredi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-4, 'Jeudi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-5, 'Vendredi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-6, 'Samedi', 1);
-- INSERT INTO cs_jour (id, nom, etat) VALUES(-7, 'Dimanche', 1);

-- SELECT cs_struct.* FROM cs_struct join c_utilisateur_champ_action on 
-- cs_struct.id_utilisateur = c_utilisateur_champ_action.id_utilisateur 
-- join c_utilisateur_thematique on c_utilisateur_champ_action.id_utilisateur = c_utilisateur_thematique.id_utilisateur JOIN
-- c_utilisateur_public on c_utilisateur_thematique.id_utilisateur = c_utilisateur_public.id_utilisateur JOIN
-- c_utilisateur_territoire on c_utilisateur_public.id_utilisateur = c_utilisateur_territoire.id_utilisateur JOIN
-- c_utilisateur_particularite_action on c_utilisateur_territoire.id_utilisateur = c_utilisateur_particularite_action.id_utilisateur JOIN
-- c_utilisateur_modalite on  c_utilisateur_particularite_action.id_utilisateur = c_utilisateur_modalite.id_utilisateur 
-- WHERE c_utilisateur_champ_action.id_champ_action IN ('2') OR c_utilisateur_thematique.id_thematique IN ('') OR c_utilisateur_territoire.id_territoire IN ('') OR c_utilisateur_public.id_public IN ('') OR c_utilisateur_particularite_action.id_particularite_action IN ('') OR c_utilisateur_modalite.id_modalite IN ('') GROUP  by cs_struct.id_utilisateur 

-- SELECT v_cs_struct_categorie.* FROM  v_cs_struct_categorie WHERE v_cs_struct_categorie.nom_social LIKE '%1%'

SELECT * FROM cs_champ_action ORDER by id LIMIT 3, 18446744073709551615;

INSERT INTO c_utilisateur_categorie (nom, rang, etat) VALUES('Admine', 1, 1);
INSERT INTO c_utilisateur_categorie (nom, rang, etat) VALUES('Strucure', 1, 1);
INSERT INTO c_utilisateur_categorie (nom, rang, etat) VALUES('Acteur', 1, 1);



INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Action Sociale','Optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/action-sociale.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Administration','Ooptio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/administration.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Orientation/Insertion','Optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!','static/illustrations/categories/orientation-insertion.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Prévention/Citoynneté','Optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/prevention-citoyennete.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Santé','Optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/Sante.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Socio-educatif','Optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/Socio-educatif.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Vie locale','optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/vie-locale.png',1);
INSERT INTO cs_categorie (nom, desc_cat,image_cat,etat) VALUES('Scolarité','optio accusamus nulla cumque, debitis quas autem non dicta animi ducimus!', 'static/illustrations/categories/scolarite.png',1);


INSERT INTO cs_champ_action (nom, etat) VALUES('Accès aux droits', 1);
INSERT INTO cs_champ_action (nom, etat) VALUES('Participation citoyenne des habitants', 1);
INSERT INTO cs_champ_action (nom, etat) VALUES('Soutien aux professionnels et aux pratiques interacteurs', 1); 
INSERT INTO cs_champ_action (nom, etat) VALUES('Animation de la vie sociale', 1);
INSERT INTO cs_champ_action (nom, etat) VALUES('Activité physique et sportive', 1);

INSERT INTO cs_thematique (nom, etat) VALUES('Addiction', 1);
INSERT INTO cs_thematique (nom, etat) VALUES('Cliant Scolaire', 1);
INSERT INTO cs_thematique (nom, etat) VALUES('Education aux médias', 1);
INSERT INTO cs_thematique (nom, etat) VALUES('Annimation de réseau  interacteurs', 1);


INSERT INTO cs_public (nom, etat) VALUES('Jeune enfant', 1);
INSERT INTO cs_public (nom, etat) VALUES('Enfant', 1);
INSERT INTO cs_public (nom, etat) VALUES('Pré-ado', 1);
INSERT INTO cs_public (nom, etat) VALUES('Ado', 1);
INSERT INTO cs_public (nom, etat) VALUES('Adulte', 1);
INSERT INTO cs_public (nom, etat) VALUES('Famille/ Parent', 1);
INSERT INTO cs_public (nom, etat) VALUES('Professionel', 1);

INSERT INTO cs_particularite_action (nom, desc_action,etat) VALUES('Acocompagnement individuel', null,1);
INSERT INTO cs_particularite_action (nom, desc_action,etat) VALUES('Actions réservés au temps scolaire',null,1);
INSERT INTO cs_particularite_action (nom, desc_action,etat) VALUES('Mentorat',null,1);
INSERT INTO cs_particularite_action (nom, desc_action,etat) VALUES('Primo arrivant',null,1);

INSERT INTO cs_territoire (nom, etat) VALUES('Val-Argent-Nord', 1);
INSERT INTO cs_territoire (nom, etat) VALUES('Val-Argent-Sud', 1);
INSERT INTO cs_territoire (nom, etat) VALUES('Centre Ville', 1);
INSERT INTO cs_territoire (nom, etat) VALUES('Coteux', 1);
INSERT INTO cs_territoire (nom, etat) VALUES('Voleembert', 1);
INSERT INTO cs_territoire (nom, etat) VALUES('Orgemont', 1);

INSERT INTO cs_modalite (nom, desc_modalite,etat) VALUES('Sur adhésion', null,1);
INSERT INTO cs_modalite (nom, desc_modalite,etat) VALUES('Sur prise de rendez-vous',null,1);
INSERT INTO cs_modalite (nom, desc_modalite,etat) VALUES('Uniquement sur libre adhésion',null,1);
INSERT INTO cs_modalite (nom, desc_modalite,etat) VALUES('Participation financière nécessaire',null,1);




-- select cs_modalite.*,c_utilisateur_modalite.id_utilisateur from cs_modalite join
-- c_utilisateur_modalite on cs_modalite.id = c_utilisateur_modalite.id_modalite;