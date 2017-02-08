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



$app->get('/doc', function () {

    return <<<EOT

<!DOCTYPE html>

<html lang="fr">

    <head>

        <title></title>

        <meta charset="UTF-8">

    </head>

    <body>

        <pre>

        GET /users/

        GET /users/{id}

        renvoit le détail d'un utilisateur

        POST /users/

        ajoute un utilisateur

        PUT /users/{id}

        ajoute ou modifie un utlisateur

        DELETE /users/{id}

        supprime un utilisateur

        </pre>

    </body>

</html>

EOT;

});

$app->get('/users', function() use ($users) {

    return json_encode($users);

});

$app->run();
