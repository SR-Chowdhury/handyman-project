<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterServiceMan;
use App\Http\Resources\RegisteredHandymanResource;


class RegisterServiceManController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $services = RegisterServiceMan::where('user_id', $user_id)->get();
        return RegisteredHandymanResource::collection($services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $registerServiceMan = new RegisterServiceMan();
        $registerServiceMan->user_id = $request->user_id;
        $registerServiceMan->address = $request->address;
        $registerServiceMan->type = $request->type;
        $registerServiceMan->price = $request->price;


        if($registerServiceMan->save())
        {
            echo "Sucessfully Registered";
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
