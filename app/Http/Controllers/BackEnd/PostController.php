<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->categories;
        $admin = Auth::user()->admin;
        $r = [];

        foreach ($categories as $category){
           $r[] = $category->pivot->category_id;
        }

        $rows = Post::all()->whereIn('category_id',$r);
        return view('backEnd.posts.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Auth::user()->categories;
        $admin = Auth::user()->admin;
        $r = [];

        foreach ($categories as $category){
            $r[] = $category->pivot->category_id;
        }
        $rows = Category::all()->whereIn('id',$r);
        return view('backEnd.posts.create',compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
//        Post::create(request()->all());

        $category = Post::create([
            'title' => $request->title,
            'post-trixFields' => request('post-trixFields'),
            'attachment-post-trixFields' => request('attachment-post-trixFields'),
            'category_id' => $request->category_id,
//            'cover' => $request->cover->store('images','public'),
        ]);
//        activity()
//            ->causedBy(Auth::user()->id)
//            ->performedOn($category)
//            ->log('edited');
        return redirect(route('post.index'));
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
    public function edit(Post $post)
    {
        $rows = Category::all();
        return view('backEnd.posts.edit',compact('post','rows'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'details' => $request->details,
            'category_id' => $request->category_id,
        ]);
        if(isset($request->cover)) {
            Storage::disk('public')->delete($post->cover);
            $post->cover = $request->cover->store('images','public');
            $post->save();
        }
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
//        return $post->trixAttachments;
        Storage::disk('public')->delete($post->trixAttachments);
        Storage::disk('public')->delete($post->cover);
        $post->trixRichText()->delete();
//        $post->trixAttachments->delete();
        $post->delete();
        return redirect()->back();
    }
}
