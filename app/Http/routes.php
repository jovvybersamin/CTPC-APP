<?php


Route::get('/', function () {
    return view('cp.layout');
});

require_once __DIR__ . '/Routes/cp/cp.php';
