<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

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

        return view('admin.users.update_password');
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
            'valid_until' => 'required_if:status,approved',
            'year' => 'required_if:status,approved',
            'district_code' => 'required_if:status,approved',
            'control_number' => 'required_if:status,approved',

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
                    'district_code' => strtoupper($request->district_code),
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
        function createOrUpdateUser($data)
        {
            $role = ['admin', 'sponsor', 'user'];
            if (!in_array($data['role'], $role)) {
                $data['role'] = 'user';
            }
            $name = ucwords(strtolower($data['name']));
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $name,
                    'email' => $data['email'],
                    'position' => $data['position'],
                    'role' => $data['role'],
                    'status' => 'approved',
                    'password' => Hash::make('password'),
                ]
            );
            return $user;
        }

        function createOrUpdateCard($user, $data)
        {

            $date = date('Y-m-d', strtotime($data['valid_until']));
            $card = Card::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'code' => uniqid(),
                    'valid_until' => $date,
                    'year' => $data['year'],
                    'district_code' => $data['district_code'],
                    'control_number' => $data['control_number'],
                ]
            );
            return $card;
        }

        $path1  = $request->file('excel')->store('temp');;
        $path = storage_path('app') . '/' . $path1;

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv->getRecords() as $data) {

            $user = createOrUpdateUser($data);

            createOrUpdateCard($user, $data);
        }

        return redirect()->route('users.index')->with('success', 'Users uploaded successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('home')->with('success', 'Password changed successfully');
    }
}
