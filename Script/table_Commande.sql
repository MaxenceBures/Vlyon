-- ============================================================
--   Table : COMMANDE                                          
-- ============================================================
create table COMMANDE
(
    Com_Code          CHAR(5)        not null,
    Com_Date          DATE           null    ,
	Com_Qte			  INTEGER(2)	 null    ,
    Com_Valide        BOOLEAN        null    ,
	Com_Produit		  CHAR(6) 		 not null,
    constraint PK_COMMANDE primary key (Com_Code)
);
alter table COMMANDE
add constraint FK_COMMANDE_PRODUIT foreign key  (Com_Produit)
       references PRODUIT (Pdt_Code);