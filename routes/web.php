<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/','ExampleController@testconn');


// basic raw curd oparation
$router->post('/details','DetailsController@DetailsCreate');
$router->get('/details','DetailsController@DetailsSelect');
$router->delete('/details','DetailsController@DetailsDelete');
$router->put('/details','DetailsController@DetailsUpdate');


   // Query Builder Data Retraiving
$router->get('/builder','BuilderController@Allrows');
$router->get('/singlerows','BuilderController@rows');
$router->get('/find','BuilderController@find');
$router->get('/pluck','BuilderController@pluck');



    //  Query Builder aggregets
$router->get('/count','BuilderController@RowCount');
$router->get('/max','BuilderController@RowMax');
$router->get('/min','BuilderController@RowMin');
$router->get('/avg','BuilderController@RowAvg');
$router->get('/sum','BuilderController@RowSum');

   //  Query builder Data Insert Update Delete
$router->post('/builder','BuilderController@Insert');
$router->put('/builder','BuilderController@Update');
$router->delete('/builder','BuilderController@Delete');


//////////////// Retrieving Models/////////////////

// $router->get('/select','DetailsController@selectAll');

$router->get('/select',['middleware'=>'auth','uses'=>'DetailsController@selectAll']);




$router->post('/select','DetailsController@selectById');

///////////////////////// Aggregets//////////////////
$router->get('/count','DetailsController@Count');
$router->get('/max','DetailsController@Max');
$router->get('/min','DetailsController@Min');
$router->get('/avg','DetailsController@Avg');
$router->get('/sum','DetailsController@Sum');


//////////////// Insert Using Model////////////////////////
$router->post('/insert','DetailsController@Insert');
$router->delete('/delete','DetailsController@Delete');
$router->put('/update','DetailsController@Update');
