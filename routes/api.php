<?php

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\Post as PostResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list posts
Route::middleware('auth:api')->get('posts', function () {
    $posts = Post::paginate(1);
    return PostResource::collection($posts);
});
