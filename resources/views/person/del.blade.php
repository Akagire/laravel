@extends('layouts.helloapp')

@section('title', 'Person.Edit')

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

    <form acton="/person/del" method="post">
        <table>
            {{ csrf_field() }}
            <tr><th>name: </th><td>{{ $form->name }}</td></tr>
            <tr><th>mail: </th><td>{{ $form->mail }}</td></tr>
            <tr><th>age: </th><td>{{ $form->age }}</td></tr>
        </table>
        <input type="hidden" name="id" value="{{ $form->id }}">
        <input type="submit" value="delete">
    </form>
@endsection

@section('footer')
<p>cp</p>
@endsection
