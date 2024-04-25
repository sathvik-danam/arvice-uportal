<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\City; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::latest()->paginate(7);
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function mypost()
    {
        return Post::latest()->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->photo1){
        $name = "1".time().'.' . explode('/', explode(':', substr($request->photo1, 0, strpos
        ($request->photo1, ';')))[1])[1];

        \Image::make($request->photo1)->resize(800, 500)->save(('img/profession/').$name);

        $request->merge(['photo1' => $name]);
        }

        if($request->photo2){
            $name = "2".time().'.' . explode('/', explode(':', substr($request->photo2, 0, strpos
            ($request->photo2, ';')))[1])[1];
    
            \Image::make($request->photo2)->resize(800, 500)->save(public_path('img/profession/').$name);
    
            $request->merge(['photo2' => $name]);
            }

        $this->validate($request,[
            'category' => 'required|string|max:191',
            'profession' => 'required|string|max:191|unique:posts'
        ]);
        
        return Post::create([
            'category' => $request['category'],
            'profession' => $request['profession'],
            'about' => $request['about'],
            'city' => $request['city'],
            'photo1' => $request['photo1'],
            'photo2' => $request['photo2'],
            'slug' => Str::slug($request->profession)
        ]);
        

    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        $this->validate($request,[
            'category' => 'required|string|max:191',
            'profession' => 'required|string|max:191|unique:posts'
        ]);

        $currentPhoto = $user->photo;
        // return $request->photo;
        if($request->photo != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
            ($request->photo, ';')))[1])[1];
 
            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request
            ['password'])]);
        }



        $user->update($request->all());
        return ['message' => "Success"];
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

        $user = Post::findOrFail($id);
        $currentPhoto = $user->photo1;
        $currentPhoto2 = $user->photo2;
        if($request->photo1 != $currentPhoto){

        $name = "1".time().'.' . explode('/', explode(':', substr($request->photo1, 0, strpos
        ($request->photo1, ';')))[1])[1];

        \Image::make($request->photo1)->resize(800, 500)->save(('img/profession/').$name);

        $request->merge(['photo1' => $name]);

        $userPhoto = ('img/profession/').$currentPhoto;
        if(file_exists($userPhoto)){
            @unlink($userPhoto);
        } 
        }
        
        if($request->photo2 != $currentPhoto2){
            $name = "2".time().'.' . explode('/', explode(':', substr($request->photo2, 0, strpos
            ($request->photo2, ';')))[1])[1];
    
            \Image::make($request->photo2)->resize(800, 500)->save(public_path('img/profession/').$name);
            $request->merge(['photo2' => $name]);

            $userPhoto2 = public_path('img/profession/').$currentPhoto2;
            if(file_exists($userPhoto2)){
                @unlink($userPhoto2);
            }
        }

        $this->validate($request,[
            'category' => 'required|string|max:191',
            'profession' => 'required|string|max:191|unique:posts,profession,'.$user->id,
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
        $user = Post::findOrFail($id); 
        $user->delete();
    } 
    public function search(Request $request){
        if($search = $request->get('q')){
            $users = Post::where(function($query) use ($search){
                $query->where('category','LIKE',"%$search%")
                ->orWhere('profession','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $users = Post::latest()->paginate(10);
        }
 
        return $users;
    }
    public function showme(Request $request) {
            $search =$request->get('q');
            $users = Subcategory::where(function($query) use ($search){
                $query->where('belongs_to','LIKE',"%$search%");
            })->paginate(10);

        return $users;
    }


}
