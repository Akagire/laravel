<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request) {
      $data = [
        ['name'=>'たろう', 'mail'=>'taro@yamada'],
        ['name'=>'はなこ', 'mail'=>'hana@flower'],
        ['name'=>'さちこ', 'mail'=>'sachi@happy'],
      ];

      return view('hello.index', [
        //'data'=>$request->data,
        'data_old'=>$data,
        'message'=>'Hello!',
      ]);

    }

}
