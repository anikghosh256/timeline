<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        // get last 10 posts or loggedin user order by id asc and return them as a resource 
        $posts = Post::where('user_id', auth()->user()->id)->latest()->take(10)->get();
        // sort posts by id desc
        $posts = PostResource::collection($posts)->sortBy('id');
        return Inertia::render('TimeLine', [
            'posts' => PostResource::collection($posts),
        ]);
    }

    /**
     * Store Post
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $content = $this->splitContent($request->content);
        $post = auth()->user()->posts()->create([
            'content' => trim($content[0]),
            'tags' => trim($content[1] ?? ''),
        ]);
        return redirect()->route('timeline');
    }

    /**
     * Split content into content and tags
     *
     * @param string $content
     * @return array
     */
    private function splitContent(string $content)
    {
        return (preg_split('/\|\|/', $content));
    }
}
