<?php


namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SearchArticle;

class BlogController extends Controller
{
    public function index(Request $request){


        $info = parent::sidebarInfo();
        $categoryName = $request->category;

        if($categoryName){
            $category = Category::where('name', $categoryName)->first();
            $articles = Article::select()->where('category_id', $category->id)->orderBy('created_at', 'asc')->paginate(1);
        }else{
            $articles = Article::select()->orderBy('created_at', 'asc')->paginate(2);
        }





        return view('blog..blog', [
                             'infoCategory'=>$info['infoCategory'],
                             'latestPost'=>$info['latestPost'],
                             'articles'=>$articles

                            ]);
   }

   public  function  search(SearchArticle $request){

       return view('category');

   }

   public function detail(Request $request){
       $info = parent::sidebarInfo();
       $idArticle = (int)$request->idArticle ? $request->idArticle : 1;
       $article = Article::where('id',$idArticle)->first() ? Article::where('id',$idArticle)->first() : Article::where('id',1)->first();
       $articlePrev  =  Article::select('id')->where('id','<', $idArticle)->first() ?  Article::select('id')->where('id','<', $idArticle)->first() : false;
       $articleNext  =  Article::select('id')->where('id','>', $idArticle)->first() ?  Article::select('id')->where('id','>', $idArticle)->first() : false;

       return view('blog.detail', [
                              'infoCategory'=>$info['infoCategory'],
                              'latestPost'=>$info['latestPost'],
                              'article'=>$article,
                              'articlePrev'=>$articlePrev,
                              'articleNext'=>$articleNext
                             ]);
   }
}
