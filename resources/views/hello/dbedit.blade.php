@extends('layouts.helloapp')

@section('title', 'DB Add')

@section('menubar')
  @parent
  修正ページ
@endsection

@section('content')
<form action="/dbcon/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}">
    <table>
        <tr><th>Name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
        <tr><th>Mail: </th><td><input type="text" name="mail" value="{{$form->mail}}"></td></tr>
        <tr><th>Age: </th><td><input type="text" name="age" value="{{$form->age}}"></td></tr>
    </table>
    <input type="submit" value="send">
</form>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
