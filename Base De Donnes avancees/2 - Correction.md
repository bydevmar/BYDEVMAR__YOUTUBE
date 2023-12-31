

On souhaite informatiser le modèle obtenu dans le SGBD Oracle :

a) Créer un utilisateur nommé "Agent".

b) Créer la base de données "Boutique".

c) Utiliser la commande permettant de sélectionner la base "Boutique".

d) Écrire les requêtes pour créer les tables décrites dans (1) et (2).
   Note : Définir les contraintes sur les clés primaires et étrangères de manière explicite.

e) Ajouter les contraintes suivantes :
   - ContrQuantité, obligeant l'utilisateur à saisir des valeurs non nulles pour l'attribut "quantité".
   - Limiter les valeurs du numéro de téléphone en respectant les normes marocaines.
  
f) "quantité" doit avoir une valeur par défaut de 0 et doit être non négative.

g) Ajouter une table "couleur" qui caractérise chaque type de couleur :
   - Chaque type de produit est caractérisé par une taille et une couleur (identifiant).
   - Les couleurs disponibles sont : noir, rouge, bleu, vert (non nulles).
  
h) On souhaite ajouter une option "promo" permettant de proposer des réductions concernant l'achat d'un produit. Pour cela, nous proposons d'ajouter un attribut "promo" qui indique le pourcentage de promotion (exemple : si "promo" = 20, cela équivaut à une réduction de 20%). N'oubliez pas d'ajouter les différentes contraintes si elles existent.

i) Insérer les valeurs suivantes dans les tables adéquates :
   - Table "Client":
      F101, Adil, Boustane, FES, 0625102030
      F102, Madiha, Amir, CASABLANCA, 0510203040

   - Table "Type De Produits":
      1, Chemise
      2, Pantalon

   - Table "Couleur":
      Noir
      Vert
      Bleu

**a) Créer un utilisateur "Agent" :**
```sql
CREATE USER Agent IDENTIFIED BY <mot_de_passe>;
```

**b) Créer la base de données "Boutique" :**
```sql
CREATE DATABASE Boutique;
```

**c) Utiliser la commande qui permet de sélectionner la base "Boutique" :**
```sql
USE Boutique;
```

**d) Écrire les requêtes pour créer les tables décrites dans (1) et (2) avec contraintes explicites :**

**Table "CLIENT" :**
```sql
CREATE TABLE CLIENT (
    CIN VARCHAR2(10) PRIMARY KEY,
    nom VARCHAR2(50),
    prenom VARCHAR2(50),
    dateNaissance DATE,
    adresse VARCHAR2(255),
    tel VARCHAR2(10) CHECK (REGEXP_LIKE(tel, '^(05|06|07)[0-9]{8}$'))
);
```

**Table "PRODUIT" :**
```sql
CREATE TABLE PRODUIT (
    RefProd NUMBER PRIMARY KEY,
    Libelle VARCHAR2(255),
    PrixUnit NUMBER,
    TypeProd VARCHAR2(50),
    CONSTRAINT chk_TypeProd CHECK (TypeProd IN ('Chemise', 'Pantalon', 'T_Shirt', 'Casquette'))
);
```

**Table "ACHETER" :**
```sql
CREATE TABLE ACHETER (
    CIN VARCHAR2(10),
    RefProd NUMBER,
    NAchats NUMBER,
    Quantite NUMBER DEFAULT 0 CHECK (Quantite >= 0),
    Montant NUMBER,
    CONSTRAINT pk_acheter PRIMARY KEY (CIN, RefProd),
    CONSTRAINT fk_acheter_client FOREIGN KEY (CIN) REFERENCES CLIENT(CIN),
    CONSTRAINT fk_acheter_produit FOREIGN KEY (RefProd) REFERENCES PRODUIT(RefProd)
);
```

**e) Ajouter les contraintes demandées :**
```sql
ALTER TABLE ACHETER
ADD CONSTRAINT ContrQuantite CHECK (Quantite IS NOT NULL);
```

**f) "Quantite" doit avoir une valeur par défaut de 0 et doit être non négative :**
Cela est déjà pris en compte dans la définition de la table "ACHETER".

**g) Ajouter une table "COULEUR" qui caractérise chaque type de couleur :**
```sql
CREATE TABLE COULEUR (
    IDCouleur NUMBER PRIMARY KEY,
    NomCouleur VARCHAR2(50) NOT NULL
);

INSERT INTO COULEUR (IDCouleur, NomCouleur)
VALUES (1, 'Noir'), (2, 'Vert'), (3, 'Blue');
```

**h) Ajouter une option "promo" :**
```sql
ALTER TABLE ACHETER
ADD Promo NUMBER CHECK (Promo >= 0 AND Promo <= 100);
```

**i) Insérer les valeurs dans les tables adéquates :**
```sql
-- Insertion dans la table CLIENT
INSERT INTO CLIENT (CIN, nom, prenom, adresse, tel)
VALUES ('F101', 'Adil', 'Boustane', 'FES', '0625102030');

INSERT INTO CLIENT (CIN, nom, prenom, adresse, tel)
VALUES ('F102', 'Madiha', 'Amir', 'CASABLANCA', '0510203040');

-- Insertion dans la table PRODUIT
INSERT INTO PRODUIT (RefProd, Libelle, PrixUnit, TypeProd)
VALUES (1, 'Chemise', 50, 'Chemise');

INSERT INTO PRODUIT (RefProd, Libelle, PrixUnit, TypeProd)
VALUES (2, 'Pantalon', 60, 'Pantalon');

-- Insertion dans la table COULEUR (déjà effectuée dans la création)
```