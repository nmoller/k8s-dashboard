<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 14/07/17
 * Time: 2:41 PM
 */


require __DIR__ . '/vendor/autoload.php';

// Create Slim app
$app = new \Slim\App();

// Fetch DI Container
$container = $app->getContainer();

// Register Mustache View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Mustache([
        'cache' => __DIR__.'/cache/mustache',
        'loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/src/views'),
        'partials_loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/src/views/partials')
    ]);
    return $view;
};

$app->group('/SB-Admin', function() use ($app) {
    $app->get('', function($request, $response, $args){
        return $this->view->render($response, 'index.mustache',
            ['page_title' => 'Home', 'page' => 'index']
        );
    });

    $app->get('/index', function($request, $response, $args){
        return $this->view->render($response, 'index.mustache',
            ['page_title' => 'Home']
        );
    });

    $app->get('/charts', function($request, $response, $args){
        return $this->view->render($response, 'charts.mustache',
            ['page_title' => 'Charts']
        );
    })->setName('charts');

    $app->get('/tables', function($request, $response, $args){
        return $this->view->render($response, 'tables.mustache',
            ['page_title' => 'Tables']
        );
    })->setName('tables');

    $app->get('/forms', function($request, $response, $args){
        return $this->view->render($response, 'forms.mustache',
            ['page_title' => 'Forms']
        );
    })->setName('forms');

    $app->get('/bootstrap-grid', function($request, $response, $args){
        return $this->view->render($response, 'bootstrap-grid.mustache',
            ['page_title' => 'Bootstrap-grid']
        );
    })->setName('bootstrap-grid');

    $app->get('/bootstrap-elements', function($request, $response, $args){
        return $this->view->render($response, 'bootstrap-elements.mustache',
            ['page_title' => 'Bootstrap-elements']
        );
    })->setName('bootstrap-elements');
});

$app->group('/app', function () use ($app) {
    $view = new \Slim\Views\Mustache([
        'cache' => __DIR__.'/cache/mustache',
        'loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/src/views/app'),
        'partials_loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/src/views/app/partials'),
    ]);

    $app->get('', function($request, $response, $args) use ($view){
        $this->view = $view;
        $test = new nmoller\command\k8sns();
        $namespaces = $test();
        return $this->view->render($response, 'index.mustache',
            ['page_title' => 'Home', 'page' => 'index', 'drop-ns' => 'Namespaces', 'namespaces'=>$namespaces]
        );
    });

    $app->get('/ns/{name}', function($request, $response, $args) use ($view){
        $this->view = $view;
        return $this->view->render($response, 'ns.mustache',
            ['page_title' => $args['name'], 'page' => 'index', 'drop-ns' => $args['name'],'namespace' => $args['name'] ]
        );
    });
});



$app->run();