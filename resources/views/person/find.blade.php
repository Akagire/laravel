@extends('layouts.helloapp')

@section('title', 'DB Person/Find')

@section('menubar')
  @parent
  検索ページ
@endsection

@section('content')
<form action="/person/find" method="post">
    {{csrf_field()}}
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="検索">
</form>
@if (isset($items))
<table>
    <tr><th>Data</th></tr>
    @foreach ($items as $item)
    <tr><td>{{$item->getData()}}</td></tr>
    @endforeach
</table>
@endif

@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
