<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(){
        $articles = Article::all();

        return view('welcome', compact('articles'));
    }
    
    public function contacts(){
        $articles = Article::all();

        return view('contacts', compact('articles'));
    }
    
    public function blog(){
        $articles = Article::all();

        return view('blog', compact('articles'));
    }
}
