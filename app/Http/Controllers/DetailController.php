<?php
/**
 * Created by PhpStorm.
 * User: саня
 * Date: 04.03.2018
 * Time: 19:49
 */

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function index(Request $request){

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
