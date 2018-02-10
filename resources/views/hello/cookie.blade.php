@extends('layouts.helloapp')

@section('title', 'Cookie')

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

<form action="/cookie" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <th>Message: </th>
            <td>
                <input type="text" name="msg" value="{{old('msg')}}">
                @if ($errors->has('msg'))
                {{$errors->first('msg')}}
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
