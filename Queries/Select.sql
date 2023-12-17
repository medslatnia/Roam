-- Search with continent --

select V.nomvil, P.nomPay 
from ville V
inner join Pays P on V.idpay = P.idPay
inner join Continent C on P.idcon = C.idcon
where C.nomcon like "param"+"%"


-- Search with Pays --

select V.nomvil, P.nomPay 
from ville V
inner join Pays P on V.idpay = P.idPay
where P.nomPay like "param"+"%"


-- Search with Ville --
select V.nomvil, P.nomPay 
from ville V
inner join Pays P on V.idpay = P.idPay
where V.nomvil like "param"+"%"


-- Search with Site --
select V.nomvil, P.nomPay 
from ville V
inner join Pays P on V.idpay = P.idPay
inner join Site S on V.idvil = S.idvil
where S.nomsit like "param"+"%"


-- search with any field --

select V.nomvil, P.nomPay 
from ville V
inner join Pays P on V.idpay = P.idPay
inner join Continent C on P.idcon = C.idcon
inner join Site S on V.idvil = S.idvil
where (C.nomcon like "param1"+"%") or (P.nomPay like "param2"+"%") or (V.nomvil like "param3"+"%") or (S.nomsit like "param4"+"%")


-- Search en cascade de la hiérarchie --
select sub1.idvil,sub1.nomvil, sub1.nomPay 
from
    (
        select sub2.idvil,sub2.nomvil, sub2.nomPay, sub2.nomsit
        from
        (
            select sub3.idvil,sub3.nomvil, sub3.nomPay, sub3.nomsit
            from
            (
                -- returns sites with their ville, pays and continent
                select V.idvil, V.nomvil, P.nomPay, S.nomsit
                from ville V
                inner join Pays P on V.idpay = P.idPay
                inner join Continent C on P.idcon = C.idcon
                inner join Site S on V.idvil = S.idvil
                where C.nomcon like "paramCon"+"%"
            ) as sub3
            where sub3.nomPay like "paramPay"+"%"

        ) as sub2
        where sub2.nomvil like "paramVil"+"%"

    ) as sub1
    where sub1.nomsit like "paramSite"+"%"


-- select ville with its sites
SELECT * FROM ville v inner join site s on v.idvil= s.idvil where (v.idvil = param); -- param is int ---

-- select id based on name --

select idcon 
from continent
where nomcon="param"


select idvil
from ville
where nomvil="param"


select idpay
from pays
where nompay="param"


select idsit
from site
where nomsit="param"


select idnec
from necessaire
where nomnec="param"

-- select details of city (get them from different queries)
select nompay FROM pays p join ville v on p.idpay = v.idpay where (p.idpay = "param")

select nomcon FROM pays p join ville v on (p.idpay = v.idpay) join continent c on (c.idcon = p.idpay) where (p.idpay = "param")

