<?php

        //Files required to run app
        require_once __DIR__.'../vendor/autoload.php';
        require_once __DIR__.'../src/Cd.php';

        //Session Cookies
        session_start();

        if (empty($_SESSION['list_of_cds'])) {
            $_SESSION['list_of_cds'] = array();
        }

        //Making the body of the app with Silex
        $app = new Silex\Application();

        //Twig Path / View path

        $app->register(new Silex\Provider\TwigServiceProvider(), array(
          'twig.path' => __DIR__.'/../views'
        ));

        //Home Page
        $app->get('/', function() use ($app) {
          $all_cds = Cd::getAll();

          return $app['twig']->render('cds.html.twig', array('cds' => $all_cds));
        });

        //Posting CDs
        $app->post('/adding_cds', function() use ($app) {

          $cd = new Cd($_POST['album'], $_POST['artist'], $_POST['cover']);
          $cd->save();

          return $app['twig']->render('adding.html.twig', array('new_album' => $cd))
        });

        
 ?>
