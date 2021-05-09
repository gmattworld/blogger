<?php

namespace Gmattworld\Blogger\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmattworld\Blogger\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BloggerAdminController extends Controller
{

    public function __construct()
    {
      // $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = posts::orderBy('created_at', 'desc')->get();
      return view('blogger::admin.posts')->with(['model'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('blogger::admin.create_post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(string $post)
    {
      $entity = posts::findOrFail($post);
      return view('blogger::admin.edit_post')->with(['model' => $entity]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'category' => 'nullable',
            'brief' => 'required',
            'body' => 'required',
            'banner' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('banner')) {
            $fileNameWithExt = $request->file('banner')->getClientOriginalName();
            $ext = $request->file('banner')->getClientOriginalExtension();
            $fileNameToStore = 'cover_' . time() . '.' . $ext;
            $path = $request->file('banner')->storeAs('public/banners', $fileNameToStore);
        }

        $entity = new posts();
        $entity->id = Str::uuid()->toString();
        $entity->topic = $request->input('topic');
        $entity->category = $request->input('category');
        $entity->brief = $request->input('brief');
        $entity->body = $request->input('body');
        $entity->banner = $request->hasFile('banner') ? $fileNameToStore : 'default.svg';
        $entity->user_id = ""; //auth()->user()->id;
        $entity->status = false;        
        $entity->save();
        return redirect('/admin/blogger')->with(['success' => 'Post created']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $post)
    {
        $this->validate($request, [
            'topic' => 'required',
            'category' => 'nullable',
            'brief' => 'required',
            'body' => 'required',
            'banner' => 'image|nullable|max:1999'
        ]);

        $entity = posts::findOrFail($post);

        //Handle File Upload
        if ($request->hasFile('banner')) {
            $fileNameWithExt = $request->file('banner')->getClientOriginalName();
            $ext = $request->file('banner')->getClientOriginalExtension();
            $fileNameToStore = 'cover_' . time() . '.' . $ext;
            $path = $request->file('banner')->storeAs('public/banners', $fileNameToStore);
        }

        $entity->topic = $request->input('topic');
        $entity->category = $request->input('category');
        $entity->brief = $request->input('brief');
        $entity->body = $request->input('body');
        if ($request->hasFile('banner')) {
          if($entity->banner != 'default.svg'){
            Storage::delete(['public/banners/' . $entity->banner]);
          }
          $entity->banner = $fileNameToStore;
        }
        $entity->status = true;
        $entity->save();
        return redirect('/admin/blogger')->with(['success' => 'Post updated']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(string $post)
    {
        $entity = posts::findOrFail($post);
        return view('blogger::admin.post')->with(['model' => $entity]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $post)
    {
        $entity = posts::findOrFail($post);
        $entity->delete();
        if($entity->banner != 'default.svg'){
          Storage::delete(['public/banners/' . $entity->banner]);
        }
        return redirect('/admin/blogger')->with('success', 'Post deleted!');
    }
}
