<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() {
      $data = [
        ['name'=>'たろう', 'mail'=>'taro@yamada'],
        ['name'=>'はなこ', 'mail'=>'hana@flower'],
        ['name'=>'さちこ', 'mail'=>'sachi@happy'],
      ];

      return view('hello.index', ['data'=>$data]);

    }

}
