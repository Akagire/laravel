<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items'=>$items]);
    }

    public function find(Request $request)
    {
        $items = Person::all();
        return view('person.find', ['input'=>'', 'items'=>$items]);
    }

    public function search(Request $request)
    {
        $min = $request->input * 1;
        $max = $min + 10;

        $items = Person::ageGreaterThan($min)->ageLessThan($max)->get();
        //$items = Person::all();
        return view('person.find', ['input'=>$request->input, 'items'=>$items]);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;

        // $form = $request->all();
        // unset($form['_token']);
        // $person->fill($form);

        $person->name = $request->name;
        $person->mail = $request->mail;
        $person->age = $request->age;
        $person->save();

        return redirect('/person');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);

        // $form = $request->all();
        // unset($form['_token']);
        // $person->fill($form);

        $person->name = $request->name;
        $person->mail = $request->mail;
        $person->age = $request->age;
        $person->save();

        return redirect('/person');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        $person = Person::find($request->id);
        $person->delete();

        return redirect('/person');
    }
}
