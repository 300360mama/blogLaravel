<?php
/**
 * Created by PhpStorm.
 * User: саня
 * Date: 04.03.2018
 * Time: 19:49
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index(){

        $info = parent::sidebarInfo();

        return view('contact', ['infoCategory'=>$info['infoCategory'], 'latestPost'=>$info['latestPost']]);
    }
}