<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();  // Get all posts
        // return Post::select('title',DB::raw('count(*) as totalOFtitle'))->groupBy('title')->get();  // groups by title

        // return Post::find(3);  // Get single post/data in object form by primary key where 3 is primary key
        // return Post::first();  // it will give first post
        // return Post::where('title','python')->get();  // according to condition it will the output
        // return Post::select('title')->get();  //limit the columns selected from the database
        /**
         *
         * return Post::chunk(5,function($todos){
         *    foreach($todos as $todo){
         *        return $todo;
         *    }
         *
         * });  // Get all posts
         */
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);
        return Post::create($validatedData);  // Create a new post
    }

    public function showPostData()
    {

        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $collection2 = collect([2, 4, 5, 6, 8]);

        $collection2D = collect([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ]);

        $strictAfterFour = $collection->after(4, strict: true);

        $afterThree = $collection->after(3);
        $beforeThree = $collection->before(4);
        $beforeThreeStrict = $collection2->before(4, strict: true);

        // why???
        $beforeFun = collect([2, 5, 6, 8])->before(function (int $item, int $key) {
            return $item > 5;
        });

        $allMethod = collect([1, 2, 3]);

        $findAverage = collect([10, 20, 30, 40, 50])->avg();

        $chunkOperation = $collection->chunk(4);

        $collapsedArr = $chunkOperation->collapse()->join(', ');
        $collapsed = $collection->collapse();

        // $ansCollapsed = $collapsed->all();
        // $chunkOperationAll = $chunkOperation->all();



        // $collapsedString = implode(', ', $collapsedArr);

        $collectionCom = collect(['name', 'age']);

        $combined = $collectionCom->combine(['George', 29]);

        $collectionConcate = collect(['John Doe']);

        $concatenated = $collectionConcate->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);

        $countTheColl = $collection->count();

        $counted = $collection->countBy();

        $matrix = $collection2->crossJoin(['a', 'b']);

        $collection3 = collect([
            ['account_id' => 1, 'product' => 'Desk'],
            ['account_id' => 2, 'product' => 'Chair'],
        ]);

        $collection3 = collect([1, 2, 3]);

        $total = $collection->reduce(function (?int $carry, int $item) {
            return $carry + $item;
        },1);

        // 6
        // $collection->dump();

        $everyExample = collect([1, 2, 3, 4])->every(function (int $value, int $key) {
            return $value > 0;
        });

        $implodePractice = $collection3->implode('product', ', ');

        echo "helo   ";
        echo $afterThree, " afterThree , ";
        echo $strictAfterFour ? $strictAfterFour : "null  ";
        echo " , ", $allMethod, " allMethod,  ";
        echo $findAverage, " findAverage , ";
        echo $beforeThree, " beforeThree , ";
        echo $beforeThreeStrict, " beforeThreeStrict , ";
        echo $beforeFun, " beforeFun,  ";
        echo $chunkOperation, " chunkOperation,  ";
        // echo $chunkOperationAll, " chunkOperationAll,  ";
        echo $collapsed, " ";
        // echo $collapsedString, " collapsedString,  ";
        echo $collapsedArr, " collapsedArr,  ";
        echo $combined, " combined,  ";
        echo $concatenated, " concatenated,  ";
        echo $countTheColl, " countTheColl,  ";
        echo $counted, " counted,  ";
        echo $matrix, " matrix,  ";
        echo $implodePractice, " implodePractice,  ";
        echo $everyExample ? "yes" : "no", " everyExample,  ";
        echo $total, " total,  ";


        $posts = Post::all()->map(function ($post) {
            $post->title = strtoupper($post->title);
            return $post;
        });

        return view('collection', compact('posts', 'afterThree', "strictAfterFour", "collapsedArr"));
    }

    // public function showPostData(){

    //     $posts = Post::all()->map(function($post){
    //        return $post;
    //     });
    //     return view('collection', compact('posts'));
    // }

    public function show(Post $post)
    {
        return $post;  // Get a single post
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required',
        ]);
        $post->update($validatedData);  // Update the post
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();  // Delete the post
        return response()->json(null, 204);
    }
}
