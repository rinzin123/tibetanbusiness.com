<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Restaurant\RestaurantBasicInfoResource;
use App\Http\Resources\Restaurant\RestaurantBasicInfoResourceCollection;
use Illuminate\Support\Facades\DB;
use App\Restaurant\RestaurantBasicInfo;
use App\User;
use Illuminate\Support\Facades\Auth;

class RestaurantBasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){
        return "message";
    
        $restaurants =  RestaurantBasicInfo::all();
        return $restaurants->toArray($restaurants);
    }
    /**
     *  Restaurant 
     *  Retrieve only the logged / ower's restaurant
     *  */ 
    public function user_restaurant(User $user)
    {

        // return Auth::user()->id;
        // $restaurants = RestaurantBasicInfo::where('user_id', '=', 'f22ce163604241e9bd43c66f0ecc7264')
        //     ->orderBy('created_at', 'desc')->paginate(3);
        $restaurants = Auth::user()->restaurant_basic_infos;
        return $restaurants->toArray($restaurants);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurant()
    {
        return view('restaurant.show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return RestaurantBasicInfoResource::collection(RestaurantBasicInfo::get());
        $restaurants =  RestaurantBasicInfo::all();
        return $restaurants->toArray($restaurants);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return new RestaurantBasicInfoResource(RestaurantBasicInfo::find($id));
    // }
    public function show($id)
    {
        // return specific user;
        return new RestaurantBasicInfoResource(RestaurantBasicInfo::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                   $restaurant = RestaurantBasicInfo::find($id);
        // $user->parents()->detach(); 
        $restaurant->delete();
    }
}
