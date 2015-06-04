<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'));
        }
        Post::create($data);
        flash('Create post success!', 'success');
        return redirect('posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     * @internal param PostRequest $request
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('title', 'id');
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param PostRequest $request
     * @return Response
     */
    public function update($id, PostRequest $request)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();

        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $post->image);
        }

        $post->update($data);
        flash('Update post success!', 'success');
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete($id);
        if (file_exists(public_path('images/' . $post->image))) {
            @unlink(public_path('images/' . $post->image));
        }
        flash('Delete post success!', 'success');
        return redirect('posts');
    }

    /**
     * Save images
     * @param $file
     * @param null $old
     * @return string
     * @internal param $request
     */
    protected function saveImage($file, $old = null)
    {
        $filename = md5(time()) . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('images/'. $filename));

        if ($old) {
            @unlink(public_path('images/' .$old));
        }
        return $filename;
    }
}
