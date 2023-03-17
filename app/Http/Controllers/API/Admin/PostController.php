<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
// use Str
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::orderBy('created_at', 'desc')
            ->with('author');

        if (request()->query('search')) {
            $post->where('title', 'like', '%' . request()->query('search') . '%');
        }

        if (request()->query('status')) {
            $post->where('status', request()->query('status'));
        }

        $res = $post->paginate(request()->query('per_page'));


        return response()->json($res);
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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'image' => 'required|image',
            'status' => 'required',
        ]);

        $path = $request->file('image')->store('public/images', env('FILESYSTEM_DISK', 'public'));

        $uniqueSlug = $this->generateUniqueSlug($request->title);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'excerpt' => $request->excerpt,
            'image' => $path,
            'status' => $request->status,
            'author_id' => auth()->user()->id,
            'slug' => $uniqueSlug,
        ]);

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return response()->json($post->load('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->fill($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images', env('FILESYSTEM_DISK', 'public'));
            $post->image = $path;
        }

        $post->save();


        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function generateUniqueSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    public function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
