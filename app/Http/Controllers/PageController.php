<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(){
        $article = Article::all();

        return view('welcome', compact('article'));
    }
    
    public function contacts(){
        $article = Article::all();

        return view('contacts', compact('article'));
    }
    
    public function blog(){
        $article = Article::all();

        return view('blog', compact('article'));
    }
}
