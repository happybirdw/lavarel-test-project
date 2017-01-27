<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    /**
     * Create a new article controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']); // ['only' => 'create']
    }

    /**
     * Show all articles.
     * 
     * @return [type] [description]
     */
    public function index()
    {
        // \Auth::user(); // get me the authentificated user

    	$articles = Article::latest('published_at')->published()->get();
        $tags = Tag::get();
    	return view('articles.index', compact('articles', 'tags'));
    }

    /**
     * Show the single Article.
     * 
     * @param  Article $article [description]
     * @return [type]           [description]
     */
    public function show(Article $article) 
    {

    	// $article = Article::findOrFail($id); // using Explicit binding instead

    	// findOrFail replace this code with find($id) methode
    	// if (is_null($article)) {
    	// 	abort(404);
    	// }

    	// dd($article->published_at); // display the object or null
        // variations of display:
        // addDays(8)->format('Y-m')
        // addDays(8)->diffForHumans() --> '5 days from now'
    	// 
    	// $tags = Tag::pluck('name', 'id');
        return view('articles.show', compact('article'));
    }

    /**
     * Show the page to create a new article.
     * 
     * @return [type] [description]
     */
    public function create() 
    {
    	// if (Auth::guest()) // Use middleware instead of to identical before showing the create page.
     //    {
     //        return redirect('articles');
     //    }
        $tags = Tag::pluck('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article.
     * 
     * @param  CreateArticleRequest $request [description]
     * @return [type]                        [description]
     */
    public function store(ArticleRequest $request) 
    {
        // $this->validate($request, ['title' => 'required', 'body' => 'required']); // with illuminateRequest, a simple way then the Requests validation
        
        // one way of saving article
        // $article = new Article($request->all());
        // Auth::user()->articles()->save($article);

        $this->createArticle($request);

        // $request = $request->all();
        // $request['user_id'] = Auth::id();
        // Article::create($request->all());
        
        session()->flash('flash_message', 'Your article has been created!');

        return redirect('articles');
    }

    /**
     * Edit an existing article.
     * 
     * @param  Article $article [description]
     * @return [type]           [description]
     */
    public function edit(Article $article)
    {
        $tags = Tag::pluck('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update an article.
     * 
     * @param  Article        $article [description]
     * @param  ArticleRequest $request [description]
     * @return [type]                  [description]
     */
    public function update(Article $article, ArticleRequest $request)
    {
        
        $this->syncTags($article, $request->input('tag_list'));

        $article->update($request->all());

        return view('articles.show', compact('article'));
    }

    /**
     * Save a new article.
     * 
     * @param  ArticleRequest $request [description]
     * @return Article                  [description]
     */
    public function createArticle(ArticleRequest $request)
    {

        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

    /**
     * Sync up the list of tags in the database.
     * 
     * @param  Article $article [description]
     * @param  Array  $tags    [description]
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }
}
