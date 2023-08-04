CREATE TABLE actualite(
    id INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    img VARCHAR(255) NOT NULL,
    brochure VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    status INT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
);

describe actualite;

insert into actualite (description,img)
values
("Grand RDV de l'Orientation du réseau Lyli ce 23 mars 2022 à partir de 14h. 
Lieu : Lorem ipsum dolor sit met consectetur.","actu.jpg");

ALTER TABLE actualite ADD COLUMN deleted_at DATETIME;