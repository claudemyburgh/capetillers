<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

class PhotosController extends Controller
{

    public function __construct() 
    {
        $this->middleware(['auth']);
    }    



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, Photo $photo)
    {
        $request->validate([
            'file' => 'distinct'
        ]);

        $file = $request->file('file');

        $productID = $product->id;

        $path = $file->move(storage_path() . '/uploads/', $photoId = $file->getClientOriginalName());
        $extention = $file->getClientOriginalExtension();
        $photoname = $photoId;
        $photothumb = 'thumbnail-' . $photoname;

        $image = Image::make($path);

        $image->fit(900,900, function($c) {
            $c->upsize();
        })->encode('jpg', 75)->save();


        $folderPath = 'products/' . $productID;
        $newPath = $folderPath . '/' . $photoname;

        if (Storage::disk('public')->put($newPath, fopen($path, 'r+'))) {
            FIle::delete($path);
        }

        $photo->fill([
            'name' => $file->getClientOriginalName(),
            'size' => $file->getClientSize(),
            'path' => $newPath
        ]);

        $photo->product()->associate($product);
        $photo->save();

        return response()->json([
            'id' => $photo->id,
            'size' => $file->getClientSize(),
            'name' => $file->getClientOriginalName(),
            'path' => Storage::url($newPath),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Photo $photo)
    {
        Storage::delete($photo->path);
        $photo->delete();
    }



    protected function generateFileName(UploadedFile $photoUpload) 
    {
        return uniqid(true) . '-' . $photoUpload->getClientOriginalName();
    }        
    

    
}
