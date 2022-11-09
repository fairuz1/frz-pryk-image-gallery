<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Post;

class PostController extends Controller {

    public function index() {
        $data = array(
            'id' => "posts",
            "posts" => Post::orderBy('created_at', 'asc')->paginate(10)
        );
        return view('posts.index')->with($data);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        //     'picture' => 'image|nullable|max:1999'
        // ]);

        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('picture')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('picture')->storeAs('public/posts_image', $filenameSimpan);

        $post = new Post;
        // $filenameSimpan = 'noimage.png';
        $post->title = $request->input('name');
        $post->description = $request->input('impressions');
        $post->picture = $filenameSimpan;
        $post->save();
        return redirect('posts');
        
        // if ($request->hasFile('picture')) {
        //     $filenameWithExt = $request->file('picture')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('picture')->getClientOriginalExtension();
        //     $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        //     $path = $request->file('picture')->storeAs('public/posts_image', $filenameSimpan);

        //     $post = new Post;
        //     $post->title = $request->input('name');
        //     $post->description = $request->input('impressions');
        //     $post->picture = $filenameSimpan;
        //     $post->save();
        // }
        

        // if ($request->hasFile('picture')) {
        //     $filenameWithExt = $request->file('picture')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('picture')->getClientOriginalExtension();
        //     $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        //     $path = $request->file('picture')->storeAs('public/posts_image', $filenameSimpan);

        //     $post = new Post;
        //     $post->picture = $filenameSimpan;
        //     $post->title = $request->input('title');
        //     $post->description = $request->input('description');
        //     $post->save();

        // } else {
        //     $filenameSimpan = 'noimage.png';
        //     $post = new Post;
        //     $post->picture = $filenameSimpan;
        //     $post->title = $request->input('title');
        //     $post->description = $request->input('description');
        //     $post->save();
        // }

        // return redirect('posts');
    }

    public function show($id) {
        $data = array(
            'id' => 'posts',
            'posts' => Post::find($id)
        );
        return view('posts.show')->with($data);
    }

    public function edit($id) {   
        $data = array(
            'id' => 'posts',
            'posts' => Post::find($id)
        );
        return view('posts.edit')->with($data);
    }

    public function update(Request $request, $id) {
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

    public function destroy(Request $request) {
        $id = $request->input('id');
        $post = Post::find($id);
        $filenameSimpan = 'noimage.png';
        // $post->delete();
        // return redirect('posts')->with('deleted', 'Data has been deleted');

        File::delete('storage/posts_image/' . $post->picture);
        Post::where('id', $id)->update([
            'picture' => $filenameSimpan
        ]);
        return redirect('posts')->with('deleted', $post->picture);
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function resizeImage(Request $request) {

        $id = $request->input('id');
        $post = Post::find($id);

        $image = $post->picture;
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/thumbnail');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['file']);
        return redirect('posts')->with('success','Image has successfully resized.');
    }
}
