<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group([
//    'middleware' => 'auth',
    'middleware' => [
        \App\Http\Middleware\Cors::class
    ],
    'prefix'    => 'admin',
    'namespace' => '\App\FeelBack\Presentation\Controllers',
], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('surveys', ['uses' => 'SurveysController@showSurveys']);
    $router->post('surveys', ['uses' => 'SurveysController@storeSurvey']);
    $router->get('surveys/{id}', ['uses' => 'SurveysController@showSurvey']);
    $router->post('surveys/{id}', ['uses' => 'SurveysController@updateSurvey']);
    $router->delete('surveys/{id}', ['uses' => 'SurveysController@deleteSurvey']);

    $router->get('reports', ['uses' => 'ReportsController@showReports']);
    $router->get('reports/{type}', ['uses' => 'ReportsController@showReport']);
    $router->post('reports/create', ['uses' => 'ReportsController@CreateReport']);

    $router->get('results', ['uses' => 'ResultsController@showDashboard']);

    $router->get('categories', ['uses' => 'CategoriesController@list']);
    $router->post('categories', ['uses' => 'CategoriesController@save']);
    $router->get('categories/{id}', ['uses' => 'CategoriesController@showCategory']);
    $router->post('categories/{id}', ['uses' => 'CategoriesController@updateCategory']);
    $router->delete('categories/{id}', ['uses' => 'CategoriesController@deleteCategory']);

    $router->get('entities', ['uses' => 'EntitiesController@showEntities']);
    $router->post('entities', ['uses' => 'EntitiesController@storeEntity']);
    $router->get('entities/{id}', ['uses' => 'EntitiesController@showEntity']);
    $router->post('entities/{id}', ['uses' => 'EntitiesController@updateEntity']);
    $router->delete('entities/{id}', ['uses' => 'EntitiesController@deleteEntity']);

    $router->get('emotions', ['uses' => 'EmotionsController@showEmotions']);
    $router->post('emotions', ['uses' => 'EmotionsController@storeEmotion']);
    $router->get('emotions/{id}', ['uses' => 'EmotionsController@showEmotion']);
    $router->post('emotions/{id}', ['uses' => 'EmotionsController@updateEmotion']);
    $router->delete('emotions/{id}', ['uses' => 'EmotionsController@deleteEmotion']);

    $router->get('customers', ['uses' => 'CustomersController@list']);
    $router->post('customers', ['uses' => 'CustomersController@store']);
    $router->get('customers/{id}', ['uses' => 'CustomersController@get']);
    $router->post('customers/{id}', ['uses' => 'CustomersController@update']);
    $router->delete('customers/{id}', ['uses' => 'CustomersController@delete']);
});


$router->group([
//    'middleware' => 'auth',
    'middleware' => [
        \App\Http\Middleware\Cors::class
    ],
    'prefix'    => 'api',
    'namespace' => '\App\FeelBack\Presentation\Controllers',
], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('survey/{id}', ['uses' => 'SurveysController@displaySurvey']);
    $router->get('survey/{id}/entities', ['uses' => 'SurveysController@displaySurveyEntities']);
    $router->post('survey/{id}', ['uses' => 'SurveysController@saveSurveyEntry']);
    $router->options('survey/{id}', function() {
        return '';
    });
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
