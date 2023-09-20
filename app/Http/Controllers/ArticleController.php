<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index(){
        $data = Article::latest()->paginate(5);

        return view("articles.index",[
            "articles" => $data
        ]);
    }

    public function detail($id)
    {
        $article = Article::find($id);

        return view('articles.detail', ['article' => $article]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if( Gate::allows('delete-article', $article) ){
            $article->delete();
            return redirect('/articles')->with('info', 'An article deleted!');
        }

        return redirect('/articles')->with('info', 'Unauthorize to deleted.');
    }

    public function add()
    {
        $category = Category::get();

       return view('articles.add',[
        'catogeries'=>$category
       ]);
    }


    public function create()
    {
        $validator = validator(request()->all(),[
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        $edits = Article::find($id);
        return view('articles.edit',[
            'edit'=>$edits
        ]);
    }

    public function edited($id)
    {
        $edited = Article::find($id);
        // $edited->article_id = request()->id;
        $edited->title = request()->title;
        $edited->body = request()->body;
        $edited->update();

        return redirect("/articles/detail/{$id}");
    }


}
