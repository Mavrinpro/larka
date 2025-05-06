<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageIntervention;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // валидация расширений и размера файла
            'image2' => 'required', // валидация расширений и размера файла
            'title' => 'required', // валидация расширений и размера файла
        ]);

        $image = $request->file('image');

        $fileName = time() . '_' . $image->getClientOriginalName();
        //dd($fileName);
        // Сохранение оригинального изображения
        $image->storeAs('public/images/', $fileName);

        // Сохранение миниатюры изображения (необязательно)
        $img = ImageIntervention::make($image->getRealPath());
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(public_path('/thumbnails/thumbnails' . $fileName));

        $data = [
            'title' => $request->title,
            'image_path' => $fileName,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ];

//        $path = "https://cdn.leonardo.ai/users/e85fd69d-25d0-4010-a768-7defae9a8153/generations/129d32f7-87fc-4f30-afd3-b48d21a98ae0/Leonardo_Kino_XL_graphic_design_t_shirt_flat_design_tiger_lond_1.jpg";

        // Разбиваем URL по слешам
        $path = $request->post('image2');
        $segments = explode("/", $path);
        $myLastElement = end($segments);
        Storage::disk('local')->put('public/images/'.time() . $myLastElement, file_get_contents($path));



        $path = Storage::path('itsolutionstuff.png');

        Image::create($data);

        return redirect()->back()->with('success', 'Изображение успешно загружено в галерею.');
        //return 444;
    }
}

