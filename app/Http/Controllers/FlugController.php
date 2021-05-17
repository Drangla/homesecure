<?php

namespace App\Http\Controllers;

use App\Flug;
use Illuminate\Http\Request;

class FlugController extends Controller
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
        $Flug = Flug::all();

        return view('flug.index', compact('Flug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flug.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Flug::create($request->validate([
            'Flugnummer' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flug  $flug
     * @return \Illuminate\Http\Response
     */
    public function show(Flug $flug)
    {
        return view('flug.show', compact('flug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flug  $flug
     * @return \Illuminate\Http\Response
     */
    public function edit(Flug $flug)
    {
        return view('flug.edit', compact($flug));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flug  $flug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flug $flug)
    {
        return $flug->update($request->validate([
            'Flugnummer' => 'required',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flug  $flug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flug $flug)
    {
        return $flug->delete();
    }


    /**
     * Show form for searching.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('flug.search');
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

        return Flug::query()
            ->where('Flugnummer', 'LIKE', "{$search}")
            ->orWhere('Ablugplanet', 'LIKE', "%{$search}%")
            ->orWhere('Zielplanet', 'LIKE', "%{$search}%")
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Flug[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function list()
    {
        return Flug::all();
    }
}
