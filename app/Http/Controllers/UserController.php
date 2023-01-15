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
        return view('admin.users.edit', compact('user'));
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
            $code = uniqid();
            $card = new Card;
            $card->create([
                'user_id' => $user->id,
                'code' => $code,
                'valid_from' => date('Y-m-d'),
                'valid_to' => date('Y-m-d', strtotime('+1 year')),
                'card_number' => $code,
                'status' => 'active',
            ]);
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
                    'status' => $data['4'],
                    'password' => Hash::make($data['5']),
                ]);

                Card::create([
                    'user_id' => $user->id,
                    'code' => uniqid(),
                    'area_code' => $data['6'],
                    'card_number' => $data['7'],
                    'valid_from' => $data['8'],
                    'valid_to' => $data['9'],
                    'status' => 'active',
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);

        return redirect()->route('users.index')->with('success', 'Users uploaded successfully');
    }
}
