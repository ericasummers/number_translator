<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/NumberTranslator.php';

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../views'));

    $app->get('/', function() use ($app) {

        return $app['twig']->render('form.html.twig');
    });

    $app->post('/result', function() use ($app) {
        $new_number_to_translate = new NumberTranslator;
        $new_number = $_POST['number'];
        $output = $new_number_to_translate->translate($new_number);

        return $app['twig']->render('result.html.twig', array('output' => $output));
    });

    return $app;
?>
