<h1>Test technique: Basic Blog</h1>

<strong>Auteur: Korab KEKA</strong>

Mission: Création d'un blog simple avec une page listing, une page detail, un formulaire de création/modification.

Requis: Laravel, VueJs (composition), TailwindCss 

<strong>Installation: </strong>

1.- Cloner le repo et se rendre dans le dossier
2.- switcher sur la branche controllers
3.- Installer les dépendances du projet laravel <code>composer install</code>
4.- Installer les dépendances du frontend <code>npm install</code>
5.- Créer un fichier .env à la racine et y copier le contenu du fichier .env.example 
6.- Créer la base de données et la peupler grace au seeder <code>php artisan migrate</code>
7.- Générer une app key <code>php artisan key:generate</code>
8.- Démarrer le serveur front <code>npm run dev</code>
9.- Démarrer le serveur back <code>php artisan serve</code>

<strong>Explications: </strong>

Pour l'installation et la mise en route du projet, j'ai utilisé un starter kit de laravel: breeze.
Cela m'a permis d'avoir une base d'application préconfigurée pour le rendu des vues en VueJs. Une petite librairie du nom de InertiaJs m'a permis de lier laravel à Vue, en offrant la possibilité de gérer le routing coté back, de passer les props au composants directement depuis le Controller, tout en gardant la flexibilité d'une UI dynamique côté front étant donné que nous ne sommes pas sur du SSR. J'ai choisi cette solution par curiosité et dans l'intérêt d'avoir un setup rapide. Le principal inconvénient est le couplage fort que cela crée entre le back et le front. 
L'autre solution, et après réflexion, dans un context réel serai selon moi meilleur, est d'utiliser Laravel comme API Rest, puis de créer "n" applications capable de la consommer.

<strong>Conclusion: </strong>

J'espère avoir pu au travers de ce test technique vous montrer mes capacitées, ma curiosité et mon envie d'apprendre (car à part Vue, je ne connaissais pas les autres technos). 
Vous avez également pu voir quelques défauts comme l'utilisation de git.

Je serais ravi de pouvoir échanger avec vous à propos de ce test. 

<strong>Korab</strong>



