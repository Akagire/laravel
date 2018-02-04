@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文</p>

  @component('components.message')
    @slot('msg_title')CAUTION!@endslot

    @slot('msg_content')
    これはメッセージ表示
    @endslot
  @endcomponent


  @include('components.message', ['msg_title'=>'OK','msg_content'=>'サブビュー'])

  @each('components.item', $data, 'item')

  <p>Controller value: 'message' = {{$message}}</p>
  <p>View Composer value: 'view_message' = {{$view_message}}</p>
@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
