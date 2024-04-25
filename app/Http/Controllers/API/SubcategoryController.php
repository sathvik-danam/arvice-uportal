<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subcategory::latest()->paginate(10);
    }
    
    public function mysubcategory()
    {
        // 'name' => $request['name'],

        return Subcategory::where("belongs_to", "like", "Web Design & Developer")->paginate(50); 

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
            'name' => 'required|string|max:191'
        ]);

        return Subcategory::create([
            'name' => $request['name'],
            'belongs_to' => $request['belongs_to']
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Subcategory::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
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
        $user = Subcategory::findOrFail($id);
        $user->delete();
    }
    public function search(Request $request){
        if($search = $request->get('q')){
            $users = Subcategory::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $users = User::latest()->paginate(10);
        }

        return $users;
    }
}
