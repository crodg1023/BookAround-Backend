<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Image::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $image_name);

                $image = new Image();
                $image->name = $image_name;

                if ($request->has('cliente_id')) {
                    $image->cliente_id = $request->cliente_id;
                }

                if ($request->has('comercio_id')) {
                    $image->comercio_id = $request->comercio_id;
                }

                $image->save();
            }

            return response()->json([
                'message' => 'Image uploaded successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Error while uploading image'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        $filename = $image->name;
        $path = public_path('uploads/' . $filename);

        if (!file_exists($path)) {
            return response()->json([
                'message' => 'Image not found'
            ], 404);
        }

        return response()->file($path);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }

    public function getCustomerImage($id) {
        $image = Image::where('cliente_id', $id)->first();

        if (!$image) {
            return response()->json([
                'message' => 'Image not found!'
            ], 404);
        }

        $path = public_path('uploads/' . $image->name);

        if (!file_exists($path)) {
            return response()->json([
                'message' => 'Image not found on server'
            ], 404);
        }

        return response()->file($path);
    }
}

