<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.users', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $card = Card::where('user_id', $user->id)->first();
        return view('admin.users.edit', compact('user', 'card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',

        ]);


        if ($request->status == 'approved') {
            $card = Card::where('user_id', $user->id)->first();
            if ($card) {
                $card->update([
                    'valid_until' => $request->valid_until,
                    'year' => $request->year,
                    'district_code' => $request->district_code,
                    'control_number' => $request->control_number,
                ]);
            } else {
                $card = Card::create([
                    'user_id' => $user->id,
                    'code' => uniqid(),
                    'valid_until' => $request->valid_until,
                    'year' => $request->year,
                    'district_code' => $request->district_code,
                    'control_number' => $request->control_number,
                ]);
            }
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $card = Card::where('user_id', $user->id)->first();
        if ($card) {
            $card->delete();
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function uploadCSV(Request $request)
    {

        // $this->validate($request, [
        //     'excel' => 'required| mimes:xls,xlsx'
        // ]);

        $path1  = $request->file('excel')->store('temp');;
        $path = storage_path('app') . '/' . $path1;

        $csvData = fopen($path, 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $user = User::create([
                    'email' => $data['0'],
                    'name' => $data['1'],
                    'position' => $data['2'],
                    'role' => $data['3'],
                    'status' => 'approved',
                    'password' => Hash::make('password123'),
                ]);

                Card::create([
                    'user_id' => $user->id,
                    'code' => uniqid(),
                    'year' => $data['4'],
                    'district_code' => $data['5'],
                    'control_number' => $data['6'],
                    'valid_until' => $data['7'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);

        return redirect()->route('users.index')->with('success', 'Users uploaded successfully');
    }
}
