<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select('*')->paginate(12);
        //dd($posts);
        return view('posts', compact('posts'));
        //dd($posts);

    }

    public function create(Request $request)
    {
        //dd($request->all());
        $allData = [$request->post()];
        $postArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'likes' => '20',
                'is_published' => '1',
            ],
            ['title' => 'enother title of post from phpstorm777777',
                'content' => 'enother some interesting content',
                'likes' => '50',
                'is_published' => '1'
            ],
        ];

        //dd($allData);
        foreach ($allData as $item) {
            Post::create($item);
        }

    }

     public function edit($id)
    {
        return view('posts.edit', ["post" => Post::find($id)]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post = Post::find($id);
        $post->update($request->all());

        //dd($post);
        return redirect()->route('show', [$id])->with('success', 'Запись была изменена!');
    }

    public function show(Request $request,$id)
    {

        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

//    public function delete($id)
//    {
//        $post = Post::withTrashed()->find($id);
//        $post->restore();
//        return back()->with('success', 'Запись добавлена!.');
//    }

 public function delete(Request $request, $id)
    {
        $Vacancy = Post::where('id',$id)->delete();

         return redirect('posts')->with('success', 'Запись удалена!');
    }

    // firstOrCreate
    // updateOrCreate

    public function firstOrCreate()
    {
        //$post = Post::find(1);
        $anotherPost = ['title' => 'title666 of another post from phpstorm', 'content' => 'some another interesting content', 'likes' => 500, 'is_published' => 2,];

        $post = Post::firstOrCreate(['title' => 'title666 of another post from phpstorm',], $anotherPost);
    }

    public function updateOrCreate()
    {
        //$post = Post::find(1);
        $anotherPost = ['title' => 'title of another post from phpstorm 2', 'content' => '567657some another interesting content 6564565', 'likes' => 500, 'is_published' => 0,];

        $post = Post::updateOrCreate(['title' => 'title of another post from phpstorm 2',], $anotherPost);
    }


}
