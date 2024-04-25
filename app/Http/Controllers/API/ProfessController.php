<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class ProfessController extends Controller
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

    public function __construct()
    {
        $this->middleware('auth:api');
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

        $this->validate($request,[
            'profession_name' => 'required|string|max:191',
            'profession' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'address' => 'required|string|max:191',
        ]);

        if($request->photo){
        $name = "1".time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
        ($request->photo, ';')))[1])[1];

        \Image::make($request->photo)->resize(300, 300)->save(public_path('img/profile/').$name);

        $request->merge(['photo' => $name]);
        }

        // $watchers = 'praveen82524@gmail.com';    
        // Notification::route('mail', $watchers)->notify(new \App\Notifications\NewPartnerAdded($watchers));

        return Professional::create([
            'profession_name' => $request['profession_name'],
            'profession' => $request['profession'],
            'type' => $request['type'],
            'city' => $request['city'],
            'address' => $request['address'],
            'about' => $request['about'],
            'photo' => $request['photo'],
            'slug' => str_slug($request->profession),
            'user_id' =>auth('api')->id(),
            'name' =>auth('api')->user()->name,
            'phone' =>auth('api')->user()->phone,
            'phone' =>auth('api')->user()->email,
        ]);

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
        $user = Professional::findOrFail($id);

        $currentPhoto = $user->photo;
        if($request->photo != $currentPhoto){

        $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
        ($request->photo, ';')))[1])[1];

        \Image::make($request->photo)->resize(800, 500)->save(('img/profile/').$name);

        $request->merge(['photo' => $name]);

        $userPhoto = ('img/profile/').$currentPhoto;
        if(file_exists($userPhoto)){
            @unlink($userPhoto);
        } 
        }
        $this->validate($request,[
            'profession_name' => 'required|string|max:191',
            'profession' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'address' => 'required|string|max:191',
        ]);
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        $user = Professional::findOrFail($id); 
        $user->delete();
    }
}
