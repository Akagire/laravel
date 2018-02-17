<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;
use Validator;

use Illuminate\Support\Facades\DB;

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

        /* Cookieの保存はResponseインスタンスへ */
        $response = new Response(view('hello.cookie', ['msg'=>'Cookieに' . $msg . 'を保存しました']));
        $response->cookie('msg', $msg, 100);

        return $response;
    }

    public function dbCon(Request $request)
    {
        /*
        if (isset($request->id)){
            //$param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', ['id' => $request->id]);
        } else {
            $items = DB::select('select * from people');
        }
        */
        if (isset($request->page)){
            $pageParView = 3;
            $page = $request->page - 1;
            $items = DB::table('people')
                        ->offset($page * $pageParView)
                        ->limit($pageParView)
                        ->get();
        } else {
            $items = DB::table('people')->orderBy('id', 'asc')->get();
        }

        return view('hello.dbcon', ['items' => $items]);
    }

    public function dbAdd(Request $request)
    {
        return view('hello.dbadd');
    }

    public function dbInsert(Request $request)
    {

        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        /*
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        */
        DB::table('people')->insert($param);

        return redirect('/dbcon');
    }

    public function dbEdit(Request $request)
    {
        if (!isset($request->id)){
            return redirect('/dbcon');
        }

        $items = DB::select('select * from people where id = :id', ['id' => $request->id]);

        return view('hello.dbedit', ['form' => $items[0]]);
    }

    public function dbUpdate(Request $request)
    {
        $param = [
            /*'id' => $request->id,*/
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        //DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/dbcon');
    }

    public function dbRemove(Request $request)
    {
        if (!isset($request->id)){
            return redirect('/dbcon');
        }

        $items = DB::select('select * from people where id = :id', ['id' => $request->id]);

        return view('hello.dbdel', ['form' => $items[0]]);
    }

    public function dbDelete(Request $request)
    {
        /* DB::delete('delete from people where id = :id', ['id' => $request->id]); */
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/dbcon');
    }

    public function dbShow(Request $request)
    {
        if (!isset($request->id)){
            return redirect('/dbcon');
        }

        $id = $request->id;
        $item = DB::table('people')->where('id', $id)->first();

        return view('hello.show', ['items' => ['items' => $item]]);
    }

    public function dbShows(Request $request)
    {
        if (!isset($request->min) and !isset($request->max)){
            return redirect('/dbcon');
        }

        //$id = $request->id;
        //$items = DB::table('people')->where('id', '<=', $id)->get();
        $min = $request->min;
        $max = $request->max;

        $items = DB::table('people')->whereRaw('age BETWEEN  ? AND ?', [$min, $max])->get();

        return view('hello.show', ['items' => $items]);
    }

}
