<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

    /*
     * Sintaxes válidas para multiplas condicionais usando where
     */

    $actors = DB::table('actor')->where('last_name', '=', 'Berry')->get();

    $actors = DB::table('actor')->where([
        ['last_name', 'Berry'],
        ['first_name', 'Karl']
    ]);

    $actors = DB::table('actor')
        ->where(function ($query) {
            $query->where('last_name', 'Berry');
        })->get();

    /*
     *  SELECT last_name, count(*) AS actor_count
     *  from actor
     *  group by last_name
     *  order by actor_count desc
     *
     * */

    $actors = DB::table('actor')
        ->select(['last_name', DB::raw('count(*) as actor_count')])
        ->groupBy('last_name')
        ->orderBy('actor_count', 'desc')
        ->get();


    return $actors;
    
});
