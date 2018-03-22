<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function sidebarInfo(){

        $res = [];

        $categories = Category::all();
        $infoCategory = [];

        foreach ($categories  as $category){
            $count = Article::where('category_id', $category->id)->count();
            $infoCategory[$category->name] = $count;

        }

        $latestPost = Article::select()->orderBy('created_at', 'asc')->limit(4)->get();


        $res['infoCategory']=$infoCategory;
        $res['latestPost']=$latestPost;

        return $res;

    }
}
