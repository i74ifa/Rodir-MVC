<?php

use Gatherwork\Controllers\HomeController;

require __DIR__ . '/Route.php';


Route::get('/', function(){

    $view = new HomeController;

    $view->View();

});


Route::get('/huda', function(){

    $view = new HomeController;

    require $view->ViewHuda();

});

Route::get('/app', function(){

    $view = new HomeController;

    $view->View();

});


Route::get('/get/{user}/get/', function(){



});

Route::post('/app/get', function(){

    $Home = new HomeController;

    print_r($Home->requestData());


});


Route::get('/user/{id}', function(){

    echo "Hi";

});


Route::post('/hudapost', function(){

});
?>

