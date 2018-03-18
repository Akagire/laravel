@extends('layouts.helloapp')

@section('title', 'DB Person/Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
<table>
    <tr><th>Data</th></tr>
    @foreach ($items as $item)
        {{--
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
        <td><a href="/person/show?id={{$item->id}}">確認</a>
        <td><a href="/person/edit?id={{$item->id}}">修正</a>
        <td><a href="/person/del?id={{$item->id}}">削除</a>
    </tr>
    --}}
    <tr>
        <td>{{$item->getData()}}</td>
        <td><a href="/person/edit?id={{ $item->id }}">修正</a></td>
        <td><a href="/person/del?id={{ $item->id }}">削除</a></td>
    </tr>
    @endforeach
    <tr>
    </tr>
</table>
<a href="/person/add">追加はこちらから</a>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
