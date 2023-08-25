<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImages;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function addProperty(Request $request)
    {

        $attrs = $request->validate([
            'town' => 'required|string',
            'quarter' => 'required|string',
            'price' => 'required|string',
            'purpose' => 'required|string',
            'user_id' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'type' => 'required|string'


        ]);

        $property = Property::create([
            'town' => $attrs['town'],
            'quarter'  => $attrs['quarter'],
            'price'  => $attrs['price'],
            'longitude' => $attrs['longitude'],
            'latitude'  => $attrs['latitude'],
            'purpose'  => $attrs['purpose'],
            'user_id'  => $attrs['user_id'],
            'rooms'  => $request->rooms,
            'kitchens'  => $request->kitchens,
            'parlours'  => $request->parlours,
            'baths'  => $request->baths,
            'note'  => $request->note,
            'type'=> $attrs['type']

        ]);

        return response([
            'data' => $property
        ], 200);
    }



    public function getAllProperties()
    {

        $properties = Property::all();


        return response([
            'data' => $properties
        ], 200);
    }



    public function getAgentProperties(Request $request)
    {
        $attrs = $request->validate([
            'id' => 'string'
        ]);

        $properties = Property::where('user_id', $attrs['id'])->with(['properties'])->get();

        return response([
            'data' => $properties
        ], 200);
    }




    public function uploadPhoto(Request $request)
    {
        $attrs = $request->validate([
            'property_id' => 'required|string',
            'name' => 'string'
        ]);

        $property = Property::find($attrs['id'])->first();

        $photo = $request->file('photo');

        if($request->has('photo')){
            $home =  $request->name . '-' .time(). '.'.$photo->extension();
            $photo->storeAs('public/properties', $home);


        PropertyImages::create([
            'url' => $home,
            'property_id'  => $property->id,

        ]);

        }



        return response([
            'message' => 'Successfully Updated your profile picture!',
            'data' => $property
        ], 200);

    }



}
