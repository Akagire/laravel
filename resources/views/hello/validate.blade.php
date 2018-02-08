@extends('layouts.helloapp')

@section('title', 'Validate')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
<p>{{$msg}}</p>

@if (count($errors) > 0)
    @component('components.message')
      @slot('msg_title')ERROR!@endslot
      @slot('msg_content')入力値にエラーがあります。@endslot
    @endcomponent
@endif

<form action="/validation" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <th>name: </th>
            <td>
                <input type="text" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                {{$errors->first('name')}}
                @endif
            </td>
        </tr>
        <tr>
            <th>mail: </th>
            <td>
                <input type="text" name="mail" value="{{old('mail')}}">
                @if ($errors->has('mail'))
                {{$errors->first('mail')}}
                @endif
            </td>
        </tr>
        <tr>
            <th>age: </th>
            <td>
                <input type="text" name="age" value="{{old('age')}}">
                @if ($errors->has('age'))
                {{$errors->first('age')}}
                @endif
            </td>
        </tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>


@endsection

@section('footer')
copyleft 2018 Akagire.
@endsection
