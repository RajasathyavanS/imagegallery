<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Files;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index() {
        $images = Image::select('id','title','tag','description')->get();

        foreach($images as $key => $img){

          $files = Files::select('image_id','image_url')->where('image_id',$img->id)->first();

        $images[$key]['image_url'] = $files->image_url;

        }

        return view('gallery.index', compact('images'));
    }

    public function create() {
        return view('gallery.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


       $imageGetId = Image::create([
            'title' => $request->title,
            'tag' => $request->tag,
            'description' => $request->description
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('public/images');
            $img = ImageOptimizer::make(storage_path('app/' . $path))->resize(800, 600)->save();

            Files::create([
            'image_id' => $imageGetId->id,
            'image_url' => Storage::url($path),
            'description' => $request->description
        ]);
        }

        return redirect()->route('gallery.index');
    }

    public function edit($id) {
        $image = Image::find($id);
        return view('gallery.edit', compact('image'));
    }

    public function galleryview($id) {
        $images = Files::where('image_id',$id)->get();
        foreach($images as $key => $image){

            $imagesfile = Image::select('title','tag')->where('id',$id)->first();

            $images[$key]['title'] = $imagesfile->title;
            $images[$key]['tag'] = $imagesfile->tag;
        }

        return view('gallery.view', compact('images'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'tag' => 'nullable'
        ]);

        $image = Image::find($id);
        $image->update($request->only(['title', 'tag', 'description']));

        return redirect()->route('gallery.index');
    }

    public function destroy($id) {
        $image = Image::find($id);
        Storage::delete('public/images/' . basename($image->image_url));
        $image->delete();
        Files::where('image_id',$id)->delete();

        return redirect()->route('gallery.index');
    }
}

