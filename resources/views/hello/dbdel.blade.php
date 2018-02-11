@extends('layouts.helloapp')

@section('title', 'DB Add')

@section('menubar')
  @parent
  修正ページ
@endsection

@section('content')
    <table>
        <tr><th>Name: </th><td>{{$form->name}}</td></tr>
        <tr><th>Mail: </th><td>{{$form->mail}}</td></tr>
        <tr><th>Age: </th><td>{{$form->age}}</td></tr>
    </table>
    <form action="/dbcon/del" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$form->id}}">
        <input type="submit" value="削除">
    </form>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
