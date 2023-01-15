<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the lastest card of the user
        $card = Card::where('user_id', auth()->user()->id)->latest()->first();
        return view('admin.mycard', compact('card'));
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
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }

    public function verifyCard($code)
    {

        $card = Card::where('code', $code)->firstOrFail();
        if ($card) {
            if ($card->valid_until < now()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Card is expired',
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Card is valid',
                ]);
            };
        }
    }

    public function verifiedCard($code)
    {
        $card = Card::where('code', $code)->firstOrFail();
        $user = User::where('id', $card->user_id)->firstOrFail();
        return view('admin.verified', compact('card', 'user'));
    }
}
