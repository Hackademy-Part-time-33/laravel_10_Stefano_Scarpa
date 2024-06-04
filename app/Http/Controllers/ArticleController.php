<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }

    public function index()
    {
        $articles = Article::paginate(8);
        return view('articles.index', compact('articles'));
    }
    
    public function dashboard(){
        return view('articles.dashboard');
    }
    
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('articles.create', compact('authors', 'categories'));
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
        
        $article = Article::create([
    
            'titles' => $request->titles,
            'slug' => str()->slug($request->titles, '-'),
            'texts' => $request->texts,
            'image' => $path_image,
            'user_id' => auth()->user()->id,
            'status' => $request->status,
            'author_id' => $request->author_id,
        ]);

        $article->categories()->attach($request->categories);

        session()->flash('success', 'Articolo Creato con successo');
        return redirect()->route('articles.index');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $path_image = $article->image;
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $file_name);
        };

        $article->update([
            'titles' => $request->titles,
            // 'slug' => str()->slug($request->titles, '-'),
            'texts' => $request->texts,
            'image' => $path_image,
            // 'user_id' => auth()->user()->id,
            'status' => $request->status
        ]);

        //in alternativa prima metodo detach() e poi attach()
        $article->categories()->sync($request->categories);

        session()->flash('success', 'Articolo Modificato con successo');
        return redirect()->route('articles.index');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('success', 'Articolo cancellato con successo');
        return redirect()->route('articles.index');
    }
}
