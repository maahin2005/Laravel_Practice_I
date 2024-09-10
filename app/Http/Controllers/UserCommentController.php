<?php

namespace App\Http\Controllers;

use App\Models\UserComment;
use Illuminate\Http\Request;

class UserCommentController extends Controller
{
    public function index(){
        return UserComment::all();
    }

    public function store(Request $request)
    {
        $comment = UserComment::create($request->all());
        return response()->json($comment, 201);
    }

    public function show($id)
    {
        $comment = UserComment::findOrFail($id);
        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = UserComment::findOrFail($id);
        $comment->delete();
        return response()->json(null, 204);
    }
}
