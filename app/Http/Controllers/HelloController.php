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

    public function val(Request $request)
    {
        return view('hello.validate',['msg'=>'フォームを入力']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,120',
        ];

        $this->validate($request, $validate_rule);
        return view('hello.validate', ['msg'=>'正しく入力されました！']);
    }

}
