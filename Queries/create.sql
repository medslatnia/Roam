CREATE DATABASE voyage;

CREATE TABLE continent
(
    idcon integer Primary key  Not null auto_increment, 
    nomcon VARCHAR(10)
    
) ;

CREATE TABLE pays
(
    idpay integer Primary key  Not null auto_increment, 
    nompay VARCHAR(10),
    idcon integer,
    foreign key (idcon) references continent(idcon) ON DELETE CASCADE
) ;

CREATE TABLE ville
(
    idvil integer Primary key  Not null auto_increment,
    nomvil VARCHAR(10), 
    descvil VARCHAR(255), 
    idpay integer,
    foreign key (idpay) references pays (idpay) ON DELETE CASCADE
) ;
CREATE TABLE site
(
    idsit integer Primary key  Not null auto_increment, 
    nomsit VARCHAR(10), 
    cheminphoto VARCHAR(255), 
    idvil integer,
    foreign key (idvil) references ville (idvil) ON DELETE CASCADE
) ;
CREATE TABLE necessaire
(
    idnec integer Primary key  Not null auto_increment, 
    typenec VARCHAR(10), 
    nomnec VARCHAR(20), 
    idvil integer,
    foreign key (idvil) references ville (idvil) ON DELETE CASCADE
) ;