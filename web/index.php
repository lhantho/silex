<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
require_once __DIR__.'/../vendor/autoload.php';

$users = [
  ['id' => 0, 'name' => 'lorem'],
  ['id' => 1, 'name' => 'ipsum'],
  ['id' => 2, 'name' => 'foo'],
];

$app = new Silex\Application();

$app['debug'] = true;


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

$app->get('/api/users/{id}', function($id) use ($users){
  return json_encode($users[$id]);
});
$app->post('/api/users/', function(Request $request) use ($users){
  $name = $request->get('name');

  $nextIndex = count($users);
  $users[] = [
    'id' => $nextIndex,
    'name' => $name,
  ];

  $lastId = count($users) - 1;
  return $lastId;
});
$app->delete('/api/users/{id}', function($id) use ($users) {
  unset($users[$id]);

  return new Response('', 204);
});
$app->run();
