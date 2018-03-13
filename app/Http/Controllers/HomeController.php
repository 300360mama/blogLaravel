<?php
/**
 * Created by PhpStorm.
 * User: саня
 * Date: 04.03.2018
 * Time: 19:48
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){

        return view('home');
   }
}