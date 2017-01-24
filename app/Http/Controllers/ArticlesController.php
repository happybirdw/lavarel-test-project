<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->published()-> get();
    	return view('articles.index', compact('articles'));
    	// return 'get All articles';
    }

    public function show($id) 
    {
    	$article = Article::findOrFail($id);

    	// findOrFail replace this code with find($id) methode
    	// if (is_null($article)) {
    	// 	abort(404);
    	// }

    	// dd($article->published_at); // display the object or null
        // variations of display:
        // addDays(8)->format('Y-m')
        // addDays(8)->diffForHumans() --> '5 days from now'
    	// 
    	return view('articles.show', compact('article'));
    }

    public function create() 
    {
    	return view('articles.create');
    }

    /**
     * [store description]
     * @param  CreateArticleRequest $request [description]
     * @return [type]                        [description]
     */
    public function store(ArticleRequest $request) 
    {
        // $this->validate($request, ['title' => 'required', 'body' => 'required']); // with illuminateRequest, a simple way then the Requests validation

        Article::create($request->all());

        return redirect('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
