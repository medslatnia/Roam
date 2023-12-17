-- delete Continent --

delete from Continent 
where nomcon="param" ;


-- delete Pays --

delete from Pays 
where nompay="param";


-- delete Ville --

delete from Ville 
where nomvil="param";


-- delete Site --

delete from site 
where nomsit="param";


-- delete necessaire --

delete from necessaire 
where nomnec="param";


-- in creation of tables, we didn't add constraint of when we delete a row we have to delete on cascade in all other tables that has the foreign key
ALTER TABLE necessaire
ADD CONSTRAINT idvil
FOREIGN KEY (idvil) 
REFERENCES ville(idvil) 
ON DELETE CASCADE;