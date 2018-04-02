<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    

    public function show(){

    	$info = parent::sidebarInfo();

    	return view('gallery', [
                             'infoCategory'=>$info['infoCategory'],
                             'latestPost'=>$info['latestPost'],
                             

                            ]);
    }
}
