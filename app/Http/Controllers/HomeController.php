<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Generator as Faker;






class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $faker = \Faker\Factory::create();
        $words5 = $faker->sentence(5);



        return view('home', ['randomStr' => $words5]);
    }

    public function home()
    {
        return view('index');
    }

    public function hello(HomeController $name)
    {
        return $name;
    }

    public function store(Request $request)
    {
        $code = random_int(1, 30);

        $request->validate(
            [
            'title' => 'required|max:255|min:5|regex:/\(\d{3}\) \d{3}-\d{4}/',
            'content' => 'required',
            'image' => 'required|url'
            ],
            [
                'title.min' => 'Заголовок должен содержать минимум 5 символов',
                'title.required' => 'Заполните заголовок',
                'content.required' => 'Введите контент',
                'image.url' => 'Сдесь должна быть ссылка на изображение',
                'image.required' => 'Введите ссылку на изображение',
                //'image.url' => 'Введите действительный адрес изображения'
            ]
        );

        $arr = ['likes' => $code];
        //$request->post()[] = $arr;
        $allData = [$request->post()];

        $allData[0]['likes'] = $arr['likes'];
//        $postArr = [
//            [
//                'title' => 'title of post from phpstorm',
//                'content' => 'some interesting content',
//                'likes' => '20',
//                'is_published' => '1',
//            ],
//            ['title' => 'enother title of post from phpstorm777777',
//                'content' => 'enother some interesting content',
//                'likes' => '50',
//                'is_published' => '1'
//            ],
//        ];



        //dd($allData);
        foreach ($allData as $item) {
            Post::create($item);
        }
        //return back()->withInput();
        // Dispatch the event with the post data
        event(new TestNotification([
            'author' => $request->post('title'),
            'title' => $request->post('content'),
        ]));
        return back()->with('success', 'Запись добавлена!.');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
