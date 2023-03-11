<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlesResource;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index(){

        $articles = Articles::all();

        return  view('articles', ['articles' => $articles]);
    
       // $article = Articles::findOrFail(100);

        // $article_new = Articles::create([
        //     'title' => '',
        //     'author' => '',
        //     'description' => '',
        // ]);

        // return Articles::count();
    }

    public function show($id){

        $articles = Articles::find($id);
        return new ArticlesResource($articles);
    }
}
