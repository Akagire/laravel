@extends('layouts.helloapp')

@section('title', 'DB Add')

@section('menubar')
  @parent
  修正ページ
@endsection

@section('content')
  @foreach ($items as $item)
    <table>
        <tr><th>ID: </th><td>{{$item->id}}</td></tr>
        <tr><th>Name: </th><td>{{$item->name}}</td></tr>
        <tr><th>Mail: </th><td>{{$item->mail}}</td></tr>
        <tr><th>Age: </th><td>{{$item->age}}</td></tr>
    </table>
  @endforeach
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
