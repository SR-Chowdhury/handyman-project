<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Resources\AdvertisementResource;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        // $ads = Advertisement::findOrFail($user_id);
        // return new AdvertisementResource($ads);
        $ads = Advertisement::where('user_id', $user_id)->get();
        return AdvertisementResource::collection($ads);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $advertisement = new Advertisement();
        $advertisement->user_id = $request->user_id;
        //$advertisement->image = $request->file('image')->store('ad_images');
        $advertisement->title = $request->title;
        $advertisement->description = $request->description;
        $advertisement->price = $request->price;
        $advertisement->area_code = $request->area_code;

        if($advertisement->save())
        {
            echo "Sucessfully saved";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ads = Advertisement::findOrFail($id);
        return new AdvertisementResource($ads);
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
