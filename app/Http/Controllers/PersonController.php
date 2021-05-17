<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Person = Person::all()->load('%');

        return view('person.index', compact('Person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Person::create($request->validate([
            'SVNR' => 'required',
            'Geburtsdatum' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('person.edit', compact($person));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        return $person->update($request->validate([
            'SVNR' => 'required',
            'Geburtsdatum' => 'required',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        return $person->delete();
    }


    /**
     * Show form for searching.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('person.search');
    }


    /**
     * Return search result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
        $search = $request->validate([
            'q' => 'required'
        ])['q'];

        return Person::query()
            ->where('SVNR', 'LIKE', "{$search}")
            ->orWhere('Geburtsdatum', 'LIKE', "%{$search}%")
            ->orWhere('Vorname', 'LIKE', "%{$search}%")
            ->orWhere('Nachname', 'LIKE', "%{$search}%")
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Person[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function list()
    {
//        return Person::all()->load('all');
        return Person::all();
    }
}
