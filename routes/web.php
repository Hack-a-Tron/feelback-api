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

$router->group(['middleware' => 'auth', 'prefix' => 'admin'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('surveys', ['uses' => 'SurveysController@showSurveys']);
    $router->get('surveys/create', ['uses' => 'SurveysController@createSurvey']);
    $router->post('surveys', ['uses' => 'SurveysController@storeSurvey']);
    $router->get('surveys/{id}', ['uses' => 'SurveysController@showSurvey']);
    $router->post('surveys/{id}', ['uses' => 'SurveysController@updateSurvey']);
    $router->delete('surveys/{id}', ['uses' => 'SurveysController@deleteSurvey']);

    $router->get('reports', ['uses' => 'ReportsController@showReports']);
    $router->get('reports/{id}', ['uses' => 'ReportsController@showReport']);
    $router->get('reports/create', ['uses' => 'ReportsController@CreateReport']);

    $router->get('results', ['uses' => 'ResultsController@showDashboard']);

    $router->get('categories', ['uses' => 'CategoriesController@showCategories']);
    $router->get('categories/create', ['uses' => 'CategoriesController@createCategory']);
    $router->post('categories', ['uses' => 'CategoriesController@storeCategory']);
    $router->get('categories/{id}', ['uses' => 'CategoriesController@showCategory']);
    $router->post('categories/{id}', ['uses' => 'CategoriesController@updateCategory']);
    $router->delete('categories/{id}', ['uses' => 'CategoriesController@deleteCategory']);

    $router->get('emotions', ['uses' => 'EmotionsController@showEmotions']);
    $router->get('emotions/create', ['uses' => 'EmotionsController@createEmotion']);
    $router->post('emotions', ['uses' => 'EmotionsController@storeEmotion']);
    $router->get('emotions/{id}', ['uses' => 'EmotionsController@showEmotion']);
    $router->post('emotions/{id}', ['uses' => 'EmotionsController@updateEmotion']);
    $router->delete('emotions/{id}', ['uses' => 'EmotionsController@deleteEmotion']);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
