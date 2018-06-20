<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class GalleryController extends Controller
{


    public function listAlbums(){
        $info = parent::sidebarInfo();
        $albums = Album::select('name')->get();

        $res = $this->replaceStr('~\s+~', '_', $albums, 'name');

    	return view('blog.albums', [
                             'infoCategory'=>$info['infoCategory'],
                             'latestPost'=>$info['latestPost'],
                             'albums'=>$albums
                            ]);
    }


    public function showAlbum(Request $request){

        $info = parent::sidebarInfo();

        $articleName = $this->replaceStr('~_~', ' ', $request->album);
        $albumId = Album::select('id')->where('name',$articleName)->first();
        $photos= Photo::select()->where('album_id', $albumId->id)->get();


        return view('blog.gallery', [
                                 'infoCategory'=>$info['infoCategory'],
                                 'latestPost'=>$info['latestPost'],
                                 'photos'=>$photos
                              ]);

}


public function replaceStr(string $pattern, string $replace, $stringList, $attrName = null){

    if(is_string($stringList)){
        $stringList = trim($stringList);
        $stringList = preg_replace($pattern, $replace, $stringList);

        return $stringList;

    }

    if($attrName){
        foreach($stringList as $str){
            $str->$attrName = trim($str->$attrName);
            $str->$attrName = preg_replace($pattern, $replace, $str->$attrName);
        }
    }


    return $stringList;


}


}
