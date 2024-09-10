<?php
namespace App\Http\Controllers;

use App\Models\UserPost;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index()
    {
        return UserPost::with('comments')->get();
    }

    public function store(Request $request)
    {
        $post = UserPost::create($request->all());
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = UserPost::with('comments')->findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = UserPost::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = UserPost::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}

