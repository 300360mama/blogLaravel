<?php
/**
 * Created by PhpStorm.
 * User: саня
 * Date: 04.03.2018
 * Time: 19:48
 */

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SearchArticle;

class HomeController extends Controller
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




        return view('home', [
                             'infoCategory'=>$info['infoCategory'],
                             'latestPost'=>$info['latestPost'],
                             'articles'=>$articles

                            ]);
   }

   public  function  search(SearchArticle $request){

       return view('category');

   }
}