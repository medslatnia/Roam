-- Insert Continent --

insert into Continent (nomcon)
values ("Afrique");


-- Insert Pays --

insert into Pays (nompay,idcon)
values ("Algérie",1);


-- Insert Ville --

insert into Ville (nomvil,descvil,idpay)
values ("Alger","Alger est la capitale de l'Algérie. Elle se trouve sur la côte méditerranéenne du pays. Elle est connue pour les bâtiments blanchis à la chaux de la Casbah, une médina dotée de rues escarpées et sinueuses, de palais ottomans et d'une citadelle en ruines. La mosquée Ketchaoua, datant du XVIIe siècle, est flanquée de 2 immenses minarets.",1);

-- Insert site --

insert into site (nomsit,cheminphoto,idvil)
values ("Casbah","../image/img_villes/casbah.jpg",1);

-- Insert necessaire --

insert into necessaire (typenec,nomnec,idvil)
values ("Hotel","sheraton",1);