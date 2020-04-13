<?php

use Illuminate\Http\Request;





Route::post('search-advanced', 'ApiController@search_advanced');
Route::post('search-simple', 'ApiController@search_simple');
