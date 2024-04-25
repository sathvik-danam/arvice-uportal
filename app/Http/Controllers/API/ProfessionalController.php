<?php

namespace App\Http\Controllers\API;

//namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;



class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Professional::latest()->paginate(5);
    }
    public function __construct()
    {
        $this->middleware('auth:api');
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
            'name' => $request['name'],
            'phone' => $request['phone'],
            'user_id' => $request['user_id'],
            // 'phone' =>auth('api')->user()->phone,
        ]);

    }

    public function profile()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function mypofession()
    {
        $id = auth('api')->id();
        return Professional::latest()->where('user_id',$id)->paginate(10);
    }
    public function search(){
        if($search = \Request::get('q')){
            $users = Professional::where(function($query) use ($search){
                $query->where('profession','LIKE',"%$search%")
                ->orWhere('profession_name','LIKE',"%$search%")
                ->orWhere('city','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $users = User::latest()->paginate(10);
        }

        return $users;
    }
}
