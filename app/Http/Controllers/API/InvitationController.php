<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Invitation;
use App\Models\GuestEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail\InvitationSentMail;
use App\Mail\InvitationCancelMail;
use App\Mail\MyEventMail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('api')->id();
        return Invitation::latest()->where('user_id',$id)->paginate(10);
        // return Invitation::latest()->paginate(7);
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
        $relation = $request->relation; 

        $id = auth('api')->id();
		$sl = time().str_slug($request->event_title);
        $hmail = auth('api')->user()->email; 
        $data = array(
            'name' => $request->hosted_by,
            'email' => auth('api')->user()->email,
            'phone' => $request->event_phone, 
            'title' => $request->event_title,
            'type' => $request->event_type,
            'message' => $request->message,
            'slug' => $sl,
         );

        if($relation == "Friend"){
        $guest = GuestEmail::select('email')
                ->where('relation', 'Friend')
                ->where('user_id',$id)->get();
                $sl = time().str_slug($request->event_title);
                 Mail::to($guest)->send(new InvitationSentMail($data));
        }
        else if($relation == "Relative"){
        $guest = GuestEmail::select('email')
                ->where('relation', 'Relative')
                ->where('user_id',$id)->get();
                $sl = time().str_slug($request->event_title);
                 Mail::to($guest)->send(new InvitationSentMail($data));
        }
        else if($relation == "Work"){
        $guest = GuestEmail::select('email')
                ->where('relation', 'Work')
                ->where('user_id',$id)->get();
                $sl = time().str_slug($request->event_title);
                 Mail::to($guest)->send(new InvitationSentMail($data));
        }
        else if($relation == "Other"){
        $guest = GuestEmail::select('email')
                ->where('relation', 'Other')
                ->where('user_id',$id)->get();
                $sl = time().str_slug($request->event_title);
                 Mail::to($guest)->send(new InvitationSentMail($data));
        }
        else if($relation == "All"){
        $guest = GuestEmail::select('email')
                ->where('user_id',$id)->get();
                $sl = time().str_slug($request->event_title);
                 Mail::to($guest)->send(new InvitationSentMail($data));
        }

         Mail::to($hmail)->send(new MyEventMail($data));
        //  Notification::send($guest, new \App\Notifications\InvitationCreated($id)); 
    
            $this->validate($request,[
                'event_title' => 'required|string|max:191',
                'event_type' => 'required|string|max:191',
                'hosted_by' => 'required|string|max:191'
            ]);
            
            return Invitation::create([
                'event_title' => $request['event_title'], 
                'event_type' => $request['event_type'],
                'hosted_by' => $request['hosted_by'],
                'user_id' =>auth('api')->id(),
                'name' =>auth('api')->user()->name,
                'phone' =>auth('api')->user()->phone,
                'email' =>auth('api')->user()->email,
                'co_hosted_by' => $request['co_hosted_by'],
                'event_date' => $request['event_date'],
                'event_time' => $request['event_time'],
                'event_phone' => $request['event_phone'],
                'landmark' => $request['landmark'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'message' => $request['message'],
                'slug' => $sl,
            ]); 
    }

    public function cancel(Request $request)
    {

        $id = auth('api')->id();
        $guest = GuestEmail::select('email')->where('user_id',$id)->get();

        $data = array( 
            'title' => $request->event_title,
         );
         Mail::to($guest)->send(new InvitationCancelMail($data));
         Session::flash('success', 'Event cancelled.');
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
        return Invitation::latest()->paginate(5);
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
        $user = Invitation::findOrFail($id);

        $this->validate($request,[
            'event_title' => 'required|string|max:191',
            'event_type' => 'required|string|max:191',
            'hosted_by' => 'required|string|max:191'
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
        $user = Invitation::findOrFail($id); 
        $user->delete();
    }

    public function search(){
        if($search = \Request::get('q')){
            $users = Invitation::where(function($query) use ($search){
                $query->where('event_title','LIKE',"%$search%")
                ->orWhere('event_type','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $users = Invitation::latest()->paginate(10);
        }
 
        return $users;
    }

}
