-- drop database cityeduc;

create database cityeduc ;

use cityeduc ;
 
create table c_utilisateur_categorie(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    rang int  DEFAULT 1,
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table c_utilisateur(
    id int NOT NULL AUTO_INCREMENT,
    id_utilisateur_categorie int not null,
    nom varchar(50) not null,
    email varchar(50) not null, 
    mdp_1 varchar(500) not null,
    date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur_categorie) references c_utilisateur_categorie(id),
    PRIMARY KEY(id)
);

create table cs_jour(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null, 
    rang int not null DEFAULT 1,
    etat int not null DEFAULT 1,
    PRIMARY KEY(id)
);

create table cs_jour_horaire(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null, -- id_struct , id_acteur
    id_rang int,
    matin varchar(50), 
    midi varchar(50),
    soir varchar(50),
	date_ins TIMESTAMP DEFAULT NOW(),
    vacances text,
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id),
    PRIMARY KEY(id)
);

create table cs_antenne(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    adresse_principale varchar(50) not null,
    email varchar(50) not null, 
    tel varchar(50) not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id),
    PRIMARY KEY(id)
);

create table cs_antenne_jour_horaire(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int, -- id_struct , id_acteur
    id_rang int,
    matin varchar(50), 
    midi varchar(50),
    soir varchar(50),
	date_ins TIMESTAMP DEFAULT NOW(),
    vacances text,
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id),
    PRIMARY KEY(id)
);

create table cs_categorie(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    desc_cat varchar(100),
    image_cat varchar(80),
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table cs_referent(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null, -- id_struct , id_acteur
    fonction varchar(50) not null, 
    nom varchar(50) not null, 
    prenom varchar(50) not null,
    email varchar(50) not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id), 
    PRIMARY KEY(id)
);

create table cs_champ_action(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(100) not null,
    etat int not null DEFAULT 1,
    PRIMARY KEY(id)
);

create table c_utilisateur_champ_action(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_champ_action int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_champ_action) references cs_champ_action(id),
    PRIMARY KEY(id)
);

create table cs_thematique(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table c_utilisateur_thematique(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_thematique int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_thematique) references cs_thematique(id),
    PRIMARY KEY(id)
);

create table cs_public(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table c_utilisateur_public(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_public int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_public) references cs_public(id),
    PRIMARY KEY(id)
);

create table cs_particularite_action(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    desc_action text,
    etat int not null DEFAULT 1,
    PRIMARY KEY(id)
);

create table c_utilisateur_particularite_action(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_particularite_action int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_particularite_action) references cs_particularite_action(id),
    PRIMARY KEY(id)
);

create table cs_territoire(
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table c_utilisateur_territoire(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_territoire int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_territoire) references cs_territoire(id),
    PRIMARY KEY(id)
);

create table cs_modalite( -- type de moyens pour recevoir le public
    id int AUTO_INCREMENT NOT NULL,
    nom varchar(50) not null,
    desc_modalite text,
    etat int not null DEFAULT 1,
    PRIMARY KEY(id)
);

create table c_utilisateur_modalite(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_modalite int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_modalite) references cs_modalite(id),
    PRIMARY KEY(id)
);

create table c_file_type(
    id int AUTO_INCREMENT NOT NULL,
    file_type varchar(50) not null,
    etat int not null DEFAULT 1, 
    PRIMARY KEY(id)
);

create table c_utilisateur_file(
    id int AUTO_INCREMENT NOT NULL,
    id_utilisateur int not null,
    id_file_type int not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_file_type) references c_file_type(id),
    PRIMARY KEY(id)
);

create table cs_struct(
    id int NOT NULL AUTO_INCREMENT,
    id_utilisateur int NOT NULL,
    id_categorie int,
    nom_social varchar(500) not null,
    sigle varchar(50) not null,
    siren varchar(50) not null,
    adresse_siege varchar(50) not null,
    adresse_principale varchar(50) not null,
    email_siege varchar(50) not null,
    tel_siege varchar(50) not null,
    site_web varchar(50),
    desc_horaire_ouverture text,
    desc_mission text,
    exemples_action text,
    photo_logo varchar(100),
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1,
    foreign key(id_utilisateur) references c_utilisateur(id),
    foreign key(id_categorie) references cs_categorie(id),
    PRIMARY KEY(id)
);


create table ca_acteur(
    id int NOT NULL AUTO_INCREMENT,
    id_utilisateur int not null,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    poste varchar(50) not null,
    tel_acteur varchar(55) not null,
    photo_profil varchar(50) not null,
	date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1,   
    foreign key(id_utilisateur) references c_utilisateur(id),
    PRIMARY KEY(id)
);

create table c_utilisateur_files(
    id int NOT NULL AUTO_INCREMENT,
    id_utilisateur int not null,
    nom_file varchar(50) not null,
    date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_utilisateur) references c_utilisateur(id),
    PRIMARY KEY(id)
);

create table c_acteur_struct(
    id int NOT NULL AUTO_INCREMENT,
    id_acteur int not null,
    id_struct int not null,
    date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 0, 
    foreign key(id_acteur) references ca_acteur(id),
    foreign key(id_struct) references cs_struct(id),
    PRIMARY KEY(id)
);

create table c_notification(
    id int NOT NULL AUTO_INCREMENT,
    id_envoyeur int not null,
    id_recepteur int not null,
    lu int not null DEFAULT 0,
    date_ins TIMESTAMP DEFAULT NOW(),
    etat int not null DEFAULT 1, 
    foreign key(id_envoyeur) references c_utilisateur(id),
    foreign key(id_recepteur) references c_utilisateur(id),
    PRIMARY KEY(id)
);


