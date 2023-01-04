<?php

namespace App\Http\Controllers;

use App\Models\SystemColor;
use Illuminate\Http\Request;

class SystemColorController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if there is no color in the database, create one else update it
        $systemColor = SystemColor::first();
        if ($systemColor) {
            $systemColor->update([
                'color' => $request->color,
            ]);
        } else {
            SystemColor::create([
                'color' => $request->color,
            ]);
        }

        return redirect()->back()->with('success', 'System color updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SystemColor  $systemColor
     * @return \Illuminate\Http\Response
     */
    public function show(SystemColor $systemColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SystemColor  $systemColor
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemColor $systemColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SystemColor  $systemColor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemColor $systemColor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SystemColor  $systemColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemColor $systemColor)
    {
        //
    }
}
