<?php

namespace App\Http\Controllers;

use App\Models\Category;use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::select('*')->paginate(12);
        //dd($posts);
        return view('category.index', compact('categories'));
        //dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allData = [$request->post()];
     $request->validate([
                'title' => 'required|max:25|min:3',
                'description' => 'required',
            ],[
                'title.required' => 'Заполните заголовок',
                'title.max' => 'Заголовок не должен превышать 255 символов ',
                'title.min' => 'Заголовок должен быть больше 3-х символов ',
                'description.required' => 'Заполните описание',
]);

        //dd($allData);
        foreach ($allData as $item) {
            Category::create($item);
        }
        return redirect()->route('categoryes.index')->with('success', 'Запись была добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('category.edit', ["category" => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd('$category');
         $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $category = Category::find($id);

        $category->update($request->all());

        //dd($post);
        return redirect()->route('categoryes.index')->with('success', 'Запись была изменена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where(['id' => $id])->delete();

         return redirect('categoryes')->with('success', 'Запись удалена!');
    }
}
