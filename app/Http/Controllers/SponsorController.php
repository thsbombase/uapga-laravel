<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();

        return view('admin.sponsors.sponsors', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_url' => 'required',
            'company_contact_person' => 'required',
            'type'  => 'required',
        ]);

        $imageName = time() . '.' . $request->company_logo->extension();
        $request->company_logo->move(public_path('images/sponsors'), $imageName);

        Sponsor::create([
            'company_name' => $request->company_name,
            'company_logo' => $imageName,
            'company_url' => $request->company_url,
            'company_contact_person' => $request->company_contact_person,
            'type' => $request->type,
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor or Partner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit($sponsor)
    {
        $sponsor = Sponsor::find($sponsor);

        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sponsor)
    {
        $sponsor = Sponsor::find($sponsor);

        $request->validate([
            'company_name' => 'required',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_url' => 'required',
            'company_contact_person' => 'required',
            'type'  => 'required',
        ]);

        if ($request->hasFile('company_logo')) {
            $imageName = time() . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('images/sponsors'), $imageName);
        } else {
            $imageName = $sponsor->company_logo;
        }
        $sponsor->update([
            'company_name' => $request->company_name,
            'company_logo' => $imageName,
            'company_url' => $request->company_url,
            'company_contact_person' => $request->company_contact_person,
            'type' => $request->type,
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor or Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($sponsor)
    {
        $sponsor = Sponsor::find($sponsor);
        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor or Partner deleted successfully');
    }
}
