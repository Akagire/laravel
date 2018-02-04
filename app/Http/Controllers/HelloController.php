<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() {
      /*
      $data = [
        'msg'=>'名前を入力してください。',
      ];

      return view('hello.index', $data);

      */
      return view ('hello.index');
    }

}
