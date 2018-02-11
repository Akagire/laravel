@extends('layouts.helloapp')

@section('title', 'DB Add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
<form action="/dbcon/add" method="post">
    {{csrf_field()}}
    <table>
        <tr><th>Name: </th><td><input type="text" name="name"></td></tr>
        <tr><th>Mail: </th><td><input type="text" name="mail"></td></tr>
        <tr><th>Age: </th><td><input type="text" name="age"></td></tr>
    </table>
    <input type="submit" value="send">
</form>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
