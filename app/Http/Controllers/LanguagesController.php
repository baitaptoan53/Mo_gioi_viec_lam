<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use App\Http\Requests\StoreLanguagesRequest;
use App\Http\Requests\UpdateLanguagesRequest;

class LanguagesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function show(Languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function edit(Languages $languages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguagesRequest  $request
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguagesRequest $request, Languages $languages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Languages $languages)
    {
        //
    }
}
