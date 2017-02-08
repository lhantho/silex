<?php

require_once __DIR__.'/../vendor/autoload.php';

$users = [
  'lorem',
  'ipsum',
  'foo',
  'bar',
  'baz',
];

$app = new Silex\Application();



$app->get('/', function () {

    return <<<EOT

<!DOCTYPE html>

<html lang="fr">

    <head>

        <title></title>

        <meta charset="UTF-8">

    </head>

    <body>

        <pre>Get /
        renvoie la doc de l'api

        GET /api/users/

        GET /api/users/{id}

        renvoit le détail d'un utilisateur

        POST /api/users/

        ajoute un utilisateur

        PUT /api/users/{id}

        ajoute ou modifie un utlisateur

        DELETE /api/users/{id}

        supprime un utilisateur

        </pre>

    </body>

</html>

EOT;

});

$app->get('/api/users/', function() use ($users) {

    return json_encode($users);

});

$app->run();
