<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Article;
use Validator;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(){
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create(){
        $tags = Tag::pluck('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request){

        $article = Auth::user()->articles()->create($request->all());

        $tagIds = $request->input('tag_list');

        $article->tags()->sync($request->input('tag_list'));


        \Session::flash('flash_message', 'Your article has been created!');

        return redirect('articles');
    }

    /**
     * @param Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article){
        $tags = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request){
        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));
        return redirect('articles');
    }
}
