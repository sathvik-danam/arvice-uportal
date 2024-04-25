<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestList;
use App\Models\Invitation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MyGuestController extends Controller
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

    public function watch($slug) 
    {
        $invite = Invitation::where('slug', $slug)->first();
        $posts = GuestList::where("slug", "$slug")
        ->paginate(10);
        return view('guestlist')
               ->with('invite', $invite)          
               ->with('posts', $posts)          
               ->with('slug', $slug);         
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

    public function myevent()
    {
        $id = Auth::id();
        $posts =  Invitation::latest()->where('user_id',$id)->paginate(10);
        return view('myevent')
                     ->with('posts', $posts);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id = Invitation::select('id')->where('slug', $slug)->first();
        $this->validate($request, [
            'name' => 'required|min:3',
            'status' => 'required',
            'total_guest' => 'required',
         ]); 
            
         $post = GuestList::create([
            'name' => $request->name,
            'guest_email' => $request->email,
            'slug' => $request->slug,
            'total_guest' => $request->total_guest,
            'attending_status' => $request->status,
         ]);

         Session::flash('success', 'Invitation status submitted succesfully.');
         return redirect()->back();
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
        $post = Invitation::find($id);
        $post->delete();
        Session::flash('success', 'Event Deleted successfully.');
        return redirect()->back();
    } 

    public function cancel(Request $request)
    {

        $post = Invitation::find($id);
        $post->delete();
        Session::flash('success', 'Event Deleted successfully.');
        return redirect()->back();

        $data = array(
            'name' => $request->hosted_by,
            'email' => auth('api')->user()->email,
            'phone' => $request->event_phone, 
            'title' => $request->event_title,
            'type' => $request->event_type,
            'message' => $request->message,
            'slug' => $sl,
         );
         Mail::to($guest)->send(new InvitationSentMail($data));
    }
}
