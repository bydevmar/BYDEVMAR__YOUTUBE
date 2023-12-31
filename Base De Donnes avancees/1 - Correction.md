# gestion d'un magasin

On souhaite informatiser une base de données d'une société de vente de vêtements. Pour cela, 
    nous avons collecté les informations suivantes :

- Un client peut acheter plusieurs produits, et un produit n'est pas limité à un seul client.
- Un client est identifié par un CIN, un nom, un prénom, une date de naissance, une adresse et 
     un numéro de téléphone.
- Nous devons également conserver des informations telles que la référence du produit (RefProd),
     le libellé (Libelle), le prix unitaire (PrixUnit), le type de produit (TypeProd), 
     le nombre d'achats (NAchats), la quantité (Quantite), et le montant total (Montant).
- Un produit peut être une chemise (Chemise), un pantalon (Pantalon), un T-shirt (T_Shirt) 
     ou une casquette (Casquette).

1) Élaborez le MCD à partir des informations précédentes.
2) Déduisez le MLD correspondant.



### Modèle Conceptuel de Données (MCD) :

- **Entité "CLIENT"**
  - CIN (Clé primaire)
  - nom
  - prenom
  - dateNaissance
  - adresse
  - tel

- **Entité "PRODUIT"**
  - RefProd (Clé primaire)
  - Libelle
  - PrixUnit
  - TypeProd

- **Entité "ACHETER"**
  - NAchats
  - Quantite
  - Montant

- **Relations :**
  - "CLIENT" -- (0,n) ACHETER (1,1) --
  - "PRODUIT" -- (0,n) ACHETER (1,1) --

Dans cette représentation textuelle, les cardinalités sont indiquées entre les entités "CLIENT", "PRODUIT" et "ACHETER". Cela signifie qu'un client peut effectuer zéro ou plusieurs achats, qu'un produit peut être acheté zéro ou plusieurs fois, et qu'un achat est effectué par un seul client et concerne un seul produit.


### Modèle Logique de Données (MLD) :

#### Table "CLIENT":

| CIN (PK) | nom     | prenom        | dateNaissance | adresse | tel       |
| -------- | ------- | ------------- | ------------- | ------- | --------- |
|          |         |               |               |         |           |


#### Table "PRODUIT":

| RefProd (PK) | Libelle | PrixUnit | TypeProd |
| ------------ | ------- | -------- | -------- |
|              |         |          |          |


#### Table "ACHETER":
| NAchats | RefProd (FK) | CIN (FK) | Quantite | Montant |
| -------- | ------------- | ------- | -------- | ------- |
|          |               |         |          |         |


Dans ces tables, les abréviations utilisées sont les suivantes :
- PK : Clé primaire
- FK : Clé étrangère

