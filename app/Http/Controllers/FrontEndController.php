<?php

//namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\City;
use App\Models\Professional;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        $appliances = Post::where("category", "like", "%Appliance Repair%")
        ->orderBy('created_at', 'desc')
        ->paginate(4);

        $beauties = Post::where("category", "like", "Beauty & Spa")
        ->orderBy('created_at', 'desc')
        ->paginate(4);

        $weddings = Post::where("category", "like", "Wedding & Events")
        ->orderBy('created_at', 'desc')
        ->paginate(4);

        $homes = Post::where("category", "like", "Home Cleaning & Repairs")
        ->orderBy('created_at', 'desc')
        ->paginate(4);

        return view('welcome')
                    ->with('appliances', $appliances)
                    ->with('beauties', $beauties)
                    ->with('weddings', $weddings)
                    ->with('homes', $homes)
                    ->with('cities', City::all());
    }


    function fetch(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = City::where("city", "like", "%{$query}%")->paginate(5);
            $output = '<ul
                        style="display:block;
                        list-style-type:none;
                        cursor:pointer;
                        position:relative">';
            foreach($data as $row){ 
                $output .= '<li>'.$row->city.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        } 
    }

    public function singlepost($slug) 
    {
    
        $post = Post::where('slug', $slug)->first();
        $partners = Professional::where("slug", "like", "$slug")
        ->where("type", "like", "Registered") 
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('single')
               ->with('post', $post)
               ->with('partners', $partners);
    }
    public function nofound()
    {
        return view('nofound');
    } 
    public function guest()
    {
        return view('guest');
    } 
    public function privacy()
    {
        return view('pages/privacy');
    }

    public function disclaimer()
    {
        return view('disclaimer');
    }
    
        public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function profile()
    {
        return view('ad-post');
    }


    public function becomeprofessional()
    {
        return view('partner');
    }

    public function invitation()
    {
        return view('invitation');
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
    public function thanks()
    {

        $watchers = 'praveen82524@gmail.com';    
        Notification::route('mail', $watchers)->notify(new \App\Notifications\NewEnquiry($watchers));

         Session::flash('success', 'We will contact you soon!');
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
        //
    }

    public function forgot()
    {
        return redirect()->action('Auth\ResetPasswordController@reset');
    }

    public function password(Request $request)
    {
        // $user = User::whereEmail($request->email)->first();

        // if($user == null){
        //     return redirect()->back()->with(['error' => 'Email Not Exists!']);
        // }

        return redirect()->action('Auth\ResetPasswordController@reset');

        // $user = Sentinel::findById($user->id);
        // $reminder = Reminder::exists($user) ? : Reminder::create($user);
        // $this->sendEmail($user, $reminder->code);

        // return redirect()->back()->with(['success' => 'Reset code sent to your email.']);
    }

    public function sendEmail(){
        Mail::send(
            'email.forgot',
            ['user' => $user, 'code' => $code],
            function($message) use ($user){
                $message->to($user->email);
                $message->subject("$user->name, reset your password.");
            }
        );
    }

    public function result()
    {
    $posts = Post::where("profession", "like", "%".request("query1")."%")
                    ->orderBy('created_at', 'desc') 
                    ->paginate(10);

        return view('result', ['posts'=>$posts->appends(request()->input())
        ]);
        

    }
}
