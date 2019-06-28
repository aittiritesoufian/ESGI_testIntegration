# Tests d'intégration

## Modèle
- Formateur
- Session
- Student
- Salle
- Organisation

## Uses Cases
- Organisation
  - Créer les sessions
  - Affecte des formateurs
  - Affecte une salle
  - Peux valider l'inscription d'un étudiant
- Student
  - S'inscrire à des session
  - à l'inscription on envoi un mail à l'étudiant
- Formateur
  - Peux valider une inscription d'étudiant

## Comandes

installer l'environnement:
```
composer install
```

Installation du serveur de données:
```
npm install -g json-server
```

Lancement de la base de donnée:
```
json-server --watch db.json
```

<a href="https://github.com/aittiritesoufian/ESGI_testsProject/blob/master/fonctionnalites.md">Accéder à la liste des fonctionnalités ici</a>.