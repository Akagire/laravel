@extends('layouts.helloapp')

@section('title', 'DB Connection')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
<table>
    <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
        <td><a href="/dbcon/edit?id={{$item->id}}">修正</a>
        <td><a href="/dbcon/del?id={{$item->id}}">削除</a>
    </tr>
    @endforeach
    <tr>
    </tr>
</table>
<a href="/dbcon/add">追加はこちらから</a>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
