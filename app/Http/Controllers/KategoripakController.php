<?php

namespace App\Http\Controllers;

use App\Kategoripaket;
use Illuminate\Http\Request;
use Auth;

class KategoripakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoripaket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategoripaket  $kategoripaket
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoripaket $kategoripaket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategoripaket  $kategoripaket
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoripaket $kategoripaket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategoripaket  $kategoripaket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategoripaket $kategoripaket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategoripaket  $kategoripaket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoripaket $kategoripaket)
    {
        //
    }
}
