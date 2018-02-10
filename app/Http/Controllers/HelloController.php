<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;
use Validator;

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
        /*
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()){
            $msg = 'クエリに問題があります';
        } else {
            $msg = 'ID/PASSを受け付けました。';
        }
        */
        return view('hello.validate',['msg'=>'フォームを入力してね']);
    }

    public function cookieEntry(Request $request)
    {
        if ($request->hasCookie('msg'))
        {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※Cookieなし';
        }

        return view('hello.cookie',['msg'=>$msg]);
    }

    public function cookiePost(Request $request)
    {
        $validateRule = [
            'msg' => 'required',
        ];
        $validateMessage = [
            'msg.required' => 'メッセージは必ず入力してね',
        ];

        $this->validate($request, $validateRule);

        $msg = $request->msg;

        /* Cookieの保存はResponseインスタンスへ
        $response = new Response(view('hello.cookie', ['msg'=>'Cookieに' . $msg . 'を保存しました']));
        $response->cookie('msg', $msg, 100);

        return $response;
    }

    public function post(HelloRequest $request)
    {
        /*
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが正しくありません',
            'age.numeric' => '年齢は数値で入力してください',
            // 'age.between' => '年齢は0~120の間で入力してください',
            'age.min' => '年齢は0歳以上で入力してください',
            'age.max' => '年齢は120歳以下で入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0', function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'min:120', function($input){
            return !is_int($input->age);
        });

        if ($validator->fails()){
            return redirect('/validation')
                ->withErrors($validator)
                ->withInput();
        }
        */

        return view('hello.validate', ['msg'=>'正しく入力されました！']);
    }

}
