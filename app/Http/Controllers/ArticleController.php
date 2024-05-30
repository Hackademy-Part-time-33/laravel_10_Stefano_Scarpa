<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $article = Article::paginate(8);
        return view('articles.index', compact('article'));
    }
    
    public function dashboard(){
        return view('articles.dashboard');
    }
    
    public function create()
    {
        return view('articles.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(StoreArticleRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $file_name);
        }
        Article::create([
    
            'titles' => $request->titles,
            'slug' => str()->slug($request->titles, '-'),
            'texts' => $request->texts,
            'image' => $path_image,
            'user_id' => auth()->user()->id,
            'status' => $request->status
        ]);

        return redirect()->route('articles.dashboard');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        //
    }
}
