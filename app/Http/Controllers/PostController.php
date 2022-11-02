<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            "posts" => Post::orderBy('created_at', 'asc')->paginate(10)
        );
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'impressions' => 'required|min:10'], 
        [
            'name.required' => 'You need to enter your name',
            'impressions.required' => 'Please write your impressions']);

        $post = new Post;
        $post->title = $request->input('name');
        $post->description = $request->input('impressions');
        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'id' => 'posts',
            'posts' => Post::find($id)
        );
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = array(
            'id' => 'posts',
            'posts' => Post::find($id)
        );
        return view('posts.edit')->with($data);
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
        $data = $request->validate([
            'name' => 'required',
            'impressions' => 'required|min:10'], 
        [
            'name.required' => 'You need to enter your name',
            'impressions.required' => 'Please write your impressions']);

        Post::where('id', $request->id)->update([
            'title' => $request->name,
            'description' => $request->impressions
        ]);
        return redirect('posts')->with('edited', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $id = $request->input('id');
        $post = Post::find($id);
        $post->delete();
        return redirect('posts')->with('deleted', 'Data has been deleted');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
