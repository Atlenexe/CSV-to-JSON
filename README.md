# Convertisseur CSV/XML vers Json

Évaluation PHP ECV Nantes 2023

## But du convertisseur

Ce convertisseur réalisé en PHP permet à l'utilisateur de convertir un certain type de fichier (en l'occurence des fichiers en **.csv** et en **.xml**) vers un fichier en **.json**.

Il est évolutif, on peut y ajouter de nouveaux types de fichier à convertir sous forme Json.

## Comment installer et lancer le projet ?

Tout d'abord, pour installer le projet, il suffit de cloner le projet dans un dossier de votre choix, en utilisant la commande suivante :

```bash
git clone https://github.com/Atlenexe/CSV-to-JSON
```

Pour lancer le projet, il suffit de lancer un serveur PHP, par exemple en utilisant le logiciel [MAMP](https://www.mamp.info/en/downloads/), d'utiliser le répertoir cloné comme projet, et d'ouvrir le fichier **index.php** dans votre navigateur avec l'URL **localhost/index.php**.

## Comment utiliser le convertisseur ?

Pour accéder à la première version du convertisseur, utilisez l'URL **localhost/index.php**, et pour la deuxième utilisant la programmation objet, utilisez **localhost/version-2.php**

Ajoutez un fichier XML ou CSV dans le champ *Choisir un fichier*, et cliquez sur le bouton *Convertir le fichier en JSON*.

Si la conversion se fait correctement, un message suivi d'un lien sera affiché sur la page, lien permettant de télécharger le fichier converti en .json.

## Structure du projet

Les deux pages principales se trouvent à la racine du projet, sous les noms **index** et **version-2**. C'est sur ces pages qu'est géré le formulaire, l'appel à la conversion, et l'affichage des messages et du lien de téléchargement.

Un dossier **Sample** est présent avec des exemples de fichiers CSV et XML qui sont à convertir.

Le dossier **convertedFiles** stocke tous les fichiers transformés en Json.

Dans le dossier **Assets**, on retrouve toutes les classes, les fonctions et les interfaces.

La classe principale **Converter** est appellée au niveau des pages principales, afin de lancer la méthode de conversion **convert**, qui va vérifier de quel type est le fichier d'origine, afin d'appeler la bonne classe dédiée au type de fichier, qui vont lancer la méthode de conversion finale qui transforme le contenu du fichier en Json.

Une fonction **download** sert à lancer le téléchargement du fichier Json.

## Ajouter un nouveau type de fichier à convertir

Afin d'ajouter un nouveau type de fichier, il faudra seulement créer une nouvelle classe, et ajouter ce nouveau type de fichier dans le switch présent dans la méthode **convert** la classe **Converter**, que l'on retrouve dans */assets/classes/Converter.php*.

La classe créée doit suivre la structure de l'interface **ConverterInterface**, présent dans */assets/interfaces/ConverterInterface.php*.
