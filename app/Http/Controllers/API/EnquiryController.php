<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\User;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return Enquiry::latest()->paginate(10);
    }

    public function enquiry()
    {
        return Enquiry::latest()->paginate(10);
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
        $user = Enquiry::findOrFail($id);
        $user->delete();
    }

    public function search(Request $request){
        if($search = $request->get('q')){
            $users = Enquiry::where(function($query) use ($search){
                $query->where('profession','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('phone','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $users = User::latest()->paginate(10);
        }

        return $users;
    }
}
