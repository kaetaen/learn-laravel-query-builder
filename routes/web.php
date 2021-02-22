<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

    /*
     *  Translating raw sql query using query builder
     */

    $actors = DB::table('actor')->where('last_name', '=', 'Berry')->get();

    return $actors;
});
