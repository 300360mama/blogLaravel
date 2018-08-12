<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use App\Helpfunc\Myhelpers as Help;

class GalleryController extends Controller
{
    private $file_gallery_path;
    private $server_gallery_path;

    public function __construct(){
        $this->file_gallery_path = __DIR__.'/../../../public/images/gallery';
        $this->server_gallery_path = '/images/gallery/';
    }

    public function showAlbums(){
        $info = parent::sidebarInfo();
        $albums = $this->get_dir($this->file_gallery_path);

    	return view('blog.albums', [
                             'infoCategory'=>$info['infoCategory'],
                             'latestPost'=>$info['latestPost'],
                             'albums'=>$albums,

                            ]);
    }


    public function showPhotos(Request $request){

        $info = parent::sidebarInfo();
        $full_path = $this->file_gallery_path.$request->album;
        $photos = $this->get_photos($full_path, ['jpeg', 'png']);


        return view('blog.photos', [
                                 'infoCategory'=>$info['infoCategory'],
                                 'latestPost'=>$info['latestPost'],
                                 'photos'=>$photos
                              ]);

      }

/*
 * [get_dir description]
 * @param string $dirname path to directoty
 * @return array        emty array || array list with directory name
 */
private function get_dir($dirname){

    $res = [];

    dump($dirname);
    if(is_dir($dirname)){

        $tmp = scandir($dirname);

        foreach($tmp as $key=>$value){
            if($value === '.' || $value ==='..') continue;
            if(is_dir($dirname.'/'.$value)) $res[] = $value;
        }


    }

    return $res;
}

private function get_photos($dirname, array $list_ext = ['jpg']){

    $res = [];

    if(!is_dir($dirname)) return $res;

    $tmp = scandir($dirname);

    foreach ($tmp as $value) {
        if($value === '.' || $value ==='..') continue;

        $full_path = $dirname.'/'.$value;
        if(is_file($full_path)) $res[$full_path] = $value;

    }

    return $res;

}


private function get_ext(string $path_to_file = ''){

    if(!is_file($path_to_file)) return false;

    $ext = getimagesize($path_to_file)['mime'];
    $ext = explode('/', $ext)[1];

    return $ext;


}
private function replaceStr(string $pattern, string $replace, $stringList, $attrName = null){

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
