<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image; 

class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
               return view('posts.create');
    }

    public function store(Request $request) {

        $data = $this->validate($request, [
            'caption' =>  'required',
            'image' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'], 
            'image' => $imagePath,
           
        ]);
        
        return redirect('/profile/' . auth()->user()->id);  

        /*dd(request()->all());   */
        }

        public function show(\App\Post $post)
        {

           // dd($post);
            return view('posts.show', compact('post'));

        }       


}
