@extends('layouts.helloapp')

@section('title', 'Person.Add')

@section('menubar')
    @parent
    新規作成
@endsection

@section('content')
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors=all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form acton="/person/add" method="post">
        <table>
            {{ csrf_field() }}
            <tr><th>name: </th><td><input type="text" name="name" value="{{ old('name') }}"></td></tr>
            <tr><th>mail: </th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></tr>
            <tr><th>age: </th><td><input type="text" name="age" value="{{ old('age') }}"></td></tr>
        </table>
        <input type="submit" value="send">
    </form>
@endsection

@section('footer')
<p>cp</p>
@endsection
