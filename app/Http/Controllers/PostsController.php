<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Repositories\Posts;
use Illuminate\Support\Facades\Lang;
use App\Rules\LocationExists;

class PostsController extends Controller
{

    /**
     * 
     */
    public function __construct() {
//        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * 
     */
    public function index(Posts $posts) {

        Lang::setLocale('de');

        // $posts = Post::latest()->get();

        // dd($posts);

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // Done with a view composer
        // $archives = Post::archives();

        // return $archives;

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * 
     */
    public function show(Post $post) {
        // $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /** 
     * 
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * 
     */
    public function store() {
        // dd(request(['title', 'body']));

        // $post = new Post();
        // $post->title = request('title');
        // $post->body = request('body');
        
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body')
        // ]);

        /**
         * If validation fails, it redirects to the previous page and gives a populated "errors" variable.
         */
//        $this->validate(request(), [
//            'title' => 'required|min:2|max:50',
//            'title' => ['required', 'min:2', 'max:50'],
//            'body' => 'required',
//            'body' => [new LocationExists(request('title'))]
//        ]);    

        $validator = \Validator::make(request(['title', 'body']), [
            'title' => ['required', 'min:2', 'max:50'],
            'body' => [new LocationExists(request('title')), 'required']
        ]);
        
        
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);


        /**
         * If we make a "publish" method in the User::class we can do this as well.
         */
        // auth()->user()->publish(
        //     new Post(request(['title', 'body']))
        // );

        return redirect('/');
    }
}
