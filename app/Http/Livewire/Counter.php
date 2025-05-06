<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Cookie;use Illuminate\Support\Facades\DB;use Livewire\Component;
use App\Models\User;

class Counter extends Component
{
    public $count = 10;
    public $user, $posts, $post, $cookie;


public function load()
{
    $this->id = request()->get('id');

    $this->post = Post::find(53);
    //dd($this->post);

      $this->count = $this->post->likes;

    return [
        'count' => $this->count,
        'post' =>$this->post->likes
        ];
}
    public function increment()
    {

        $this->cookie = Cookie::get('like');

        if (!isset($this->cookie)){
            $this->post = Post::find(53);
        $this->post->likes = $this->post ->likes + 1;
        $this->post->save();
        }

 Cookie::queue(
   Cookie::forget('minus')
      ) ;
        Cookie::queue('like', '100');

        $this->posts = Post::all();
        $this->count = $this->post->likes;

    }

    public function down($id)
    {
         Cookie::queue(
   Cookie::forget('like')
      ) ;
        $this->cookie = Cookie::get('minus');
        Cookie::queue('minus', '100');
        if (!isset($this->cookie)){

        $this->post = Post::find($id);
        $this->post->likes = $this->post ->likes - 1;

 $this->post->save();
 }
        $this->count = $this->post->likes;
$this->posts = '';
        if($this->count < 1){
            $this->count = 0;
        }
    }




     public $title = '';

    public $content = '';

    public function save()
    {
        Post::create(
            $this->only(['title', 'content'])
        );

        session()->flash('status', 'Post successfully updated.');

        return $this->redirect('/posts');
    }


    public function render()
    {
        $this->cookie = Cookie::get('like');
        return view('livewire.countlikes', ['all' => $this->cookie]);
    }
}
