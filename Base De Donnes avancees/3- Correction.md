1. On suppose que les autres informations des autres tables sont totalement remplies :
   - a) Ajouter une nouvelle couleur : Orange.
   - b) Supprimer le produit Casquette.
   - c) On veut attribuer une promotion de 20%. Proposer les requêtes adéquates.
   - d) Afficher la liste de tous les clients.
   - e) Afficher la liste des noms et prénoms des clients.
   - f) Modifier le numéro de téléphone et la ville du client Morad respectivement en '02222222222' et 'Agadir'.
   - g) Sélectionner les noms des clients de manière unique.
   - h) Sélectionner les listes de produits achetés par les clients.
   - i) Sélectionner la liste des clients dont les noms commencent par "AM".
   - j) Sélectionner la liste des clients dont leurs prénoms contiennent 'ad'.
   - k) Sélectionner la liste des achats du client 'Madiha Amir', dont les achats ont été effectués entre le '01/12/2023' et le '10/12/2023'.
   - l) Afficher les noms des produits (ne pas afficher les vrais noms de la table produit).
   - m) Calculer la somme des achats pour chaque client.
   - n) Trouver le client qui a le montant maximal des achats.
   - o) Trouver le montant moyen des clients qui ont acheté plus de trois articles, dont la valeur d'achat dépasse 1000 DH.
   - p) Trouver les trois premiers clients qui ont payé le moins d'argent.
   - q) Trouver les clients qui ont acheté des articles de couleur noir.
   - r) Trouver les noms et la date de naissance des clients qui n'ont pas acheté de T-shirts rouges ou verts.
   - s) Trouver les couleurs des articles qui n'ont été achetées par aucun client.
   - t) Quel est le type de produit le plus demandé par les clients.
   - u) Le type de produit et la couleur les plus achetés par Adil Imad.
   - v) Trouver la couleur préférée des clients qui ont Imad comme prénom.
   - w) Trouver le montant moyen des achats des personnes d'origine de Casablanca.
   - x) Supprimer la table couleur.


## Reponse


a) **Ajouter une nouvelle couleur "Orange" :**
```sql
INSERT INTO COULEUR (CouleurID, NomCouleur) VALUES (4, 'Orange');
```

b) **Supprimer le produit "Casquette" :**
```sql
DELETE FROM PRODUIT WHERE TypeProd = 'Casquette';
```

c) **Attribuer une promotion de 20% :**
```sql
UPDATE PROMOTION SET PromoPercentage = 20 WHERE RefProd = (Sélectionnez le produit concerné);
```

d) **Afficher la liste de tous les clients :**
```sql
SELECT * 
FROM CLIENT;
```

e) **Afficher la liste des noms et prénoms des clients :**
```sql
SELECT nom, prenom 
FROM CLIENT;
```

f) **Modifier le numéro de téléphone et la ville du client Morad :**
```sql
UPDATE CLIENT 
SET tel = '02222222222', adresse = 'Agadir' 
WHERE nom = 'Morad';
```

g) **Sélectionner les noms des clients de manière unique :**
```sql
SELECT DISTINCT nom 
FROM CLIENT;
```

h) **Sélectionner les listes de produits achetés par les clients :**
```sql
SELECT c.nom, c.prenom, p.Libelle, a.NAchats 
FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
JOIN PRODUIT p ON a.RefProd = p.RefProd;
```

i) **Sélectionner la liste des clients dont les noms commencent par "AM" :**
```sql
SELECT * FROM CLIENT WHERE nom LIKE 'AM%';
```

j) **Sélectionner la liste des clients dont leurs prénoms contiennent 'ad' :**
```sql
SELECT * FROM CLIENT WHERE prenom LIKE '%ad%';
```

k) **Sélectionner la liste des achats du client 'Madiha Amir' entre '01/12/2023' et '10/12/2023' :**
```sql
SELECT c.nom, c.prenom, p.Libelle, a.NAchats, a.Montant FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
JOIN PRODUIT p ON a.RefProd = p.RefProd
WHERE c.nom = 'Madiha' AND c.prenom = 'Amir'
  AND a.DateAchat BETWEEN TO_DATE('01/12/2023', 'DD/MM/YYYY') AND TO_DATE('10/12/2023', 'DD/MM/YYYY');
```

l) **Afficher les noms des produits (ne pas afficher les vrais noms de la table produit) :**
```sql
SELECT Libelle AS "Nom du Produit" FROM PRODUIT;
```

m) **Calculer la somme des achats pour chaque client :**
```sql
SELECT c.nom, c.prenom, SUM(a.Montant) AS "Total des Achats" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
GROUP BY c.nom, c.prenom;
```

n) **Trouver le client qui a le montant maximal des achats :**
```sql
SELECT c.nom, c.prenom, SUM(a.Montant) AS "Total des Achats" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
GROUP BY c.nom, c.prenom
ORDER BY "Total des Achats" DESC
FETCH FIRST ROW ONLY;
```

o) **Trouver le montant moyen des clients qui ont acheté plus de trois articles, dont la valeur d'achat dépasse 1000 DH :**
```sql
SELECT c.nom, c.prenom, AVG(a.Montant) AS "Montant Moyen" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
WHERE a.NAchats > 3 AND a.Montant > 1000
GROUP BY c.nom, c.prenom;
```

p) **Trouver les trois premiers clients qui ont payé le moins d'argent :**
```sql
SELECT c.nom, c.prenom, SUM(a.Montant) AS "Total des Achats" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
GROUP BY c.nom, c.prenom
ORDER BY "Total des Achats"
FETCH FIRST 3 ROWS ONLY;
```

q) **Trouver les clients qui ont acheté des articles de couleur noir :**
```sql
SELECT DISTINCT c.nom, c.prenom FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
JOIN PRODUIT_COULEUR pc ON a.RefProd = pc.RefProd
JOIN COULEUR co ON pc.CouleurID = co.CouleurID
WHERE co.NomCouleur = 'Noir';
```

r) **Trouver les noms et la date de naissance des clients qui n'ont pas acheté de T-shirts rouges ou verts :**
```sql
SELECT c.nom, c.prenom, c.dateNaissance FROM CLIENT c
WHERE NOT EXISTS (
    SELECT 1 FROM ACHETER a
    JOIN PRODUIT p ON a.RefProd = p.RefProd
    JOIN PRODUIT_COULEUR pc ON p.RefProd = pc.RefProd
    JOIN COULEUR co ON pc.CouleurID = co.CouleurID
    WHERE a.CIN = c.CIN AND p.TypeProd = 'T_Shirt' AND co.NomCouleur IN ('Rouge', 'Vert')
);
```

s) **Trouver les couleurs des articles qui n'ont été achetées par aucun client :**
```sql
SELECT DISTINCT co.NomCouleur FROM COULEUR co
LEFT JOIN PRODUIT_COULEUR pc ON co.CouleurID = pc.CouleurID
WHERE pc.RefProd IS NULL;
```

t) **Quel est le type de produit le plus demandé par les clients :**
```sql
SELECT p.TypeProd, COUNT(*) AS "Nombre d'achats" FROM ACHETER a
JOIN PRODUIT p ON a.RefProd = p.RefProd
GROUP BY p.TypeProd
ORDER BY "Nombre d'achats" DESC
FETCH FIRST ROW ONLY;
```

u) **Le type de produit et la couleur les plus achetés par Adil Imad :**
```sql
SELECT p.TypeProd, co.NomCouleur, COUNT(*) AS "Nombre d'achats" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
JOIN PRODUIT p ON a.RefProd = p.RefProd
JOIN PRODUIT_COULEUR pc ON p.RefProd = pc.RefProd
JOIN COULEUR co ON pc.CouleurID = co.CouleurID
WHERE c.nom = 'Adil' AND c.prenom = 'Imad'
GROUP BY p.TypeProd, co.NomCouleur
ORDER BY "Nombre d'achats" DESC
FETCH FIRST ROW ONLY;
```

v) **Trouver la couleur préférée des clients qui ont Imad comme prénom :**
```sql
SELECT co.NomCouleur, COUNT(*) AS "Nombre d'achats" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
JOIN PRODUIT_COULEUR pc ON a.RefProd = pc.RefProd
JOIN COULEUR co ON pc.CouleurID = co.CouleurID
WHERE c.prenom = 'Imad'
GROUP BY co.NomCouleur
ORDER BY "Nombre d'achats" DESC
FETCH FIRST ROW ONLY;
```

w) **Trouver le montant moyen des achats des personnes d'origine de Casablanca :**
```sql
SELECT AVG(a.Montant) AS "Montant Moyen" FROM CLIENT c
JOIN ACHETER a ON c.CIN = a.CIN
WHERE c.adresse LIKE '%Casablanca%';
```

x) **Supprimer la table "COULEUR" :**
```sql
DROP TABLE COULEUR;
```

Notez que certaines requêtes nécessiteront des ajustements en fonction de votre schéma de base de données réel. N'oubliez pas de remplacer les commentaires tels que `(Sélectionnez le produit concerné)` par des valeurs spécifiques.