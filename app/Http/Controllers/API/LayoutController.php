<?php

namespace App\Http\Controllers\API;

use App\Layout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
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
     * @param  int  Layout $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Layout $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layout $layout)
    {
        $attributes = $request->input('layout');
        unset($attributes['project']);
        $layout->fill($attributes);
        $layout->save();
        return $layout;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Layout $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
