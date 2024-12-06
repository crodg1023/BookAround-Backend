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
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
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

    public function getBusinessImages($id)
    {
        $images = Image::where('comercio_id', $id)->get();

        if ($images->isEmpty())
        {
            return response()->json([
                'message' => 'No images found for this business'
            ], 404);
        }

        $imagesPaths = $images->map(function ($image) {
            $path = public_path('uploads/' . $image->name);
            if (file_exists($path)) {
                return asset('uploads/' . $image->name);
            }
            return null;
        })->filter();

        if ($imagesPaths->isEmpty()) {
            return response()->json([
                'message' => 'No images found on the server'
            ], 404);
        }

        return response()->json([
            'images' => $imagesPaths
        ]);
    }

    public function deleteCustomerImage($id)
    {
        $image = Image::where('cliente_id', $id)->first();
        $file_path = public_path('uploads/' . $image->name);

        if (file_exists($file_path))
        {
            unlink($file_path);
            $image->delete();
            return response()->json([
                'message' => 'image deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'File not found'
        ], 404);
    }

    public function updateCustomerImage(Request $request, $id)
    {
        \Log::info($request);
        $request->validate([
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = Image::where('cliente_id', $id)->first();
        $file_path = public_path('uploads/' . $image->name);

        if (file_exists($file_path))
        {
            unlink($file_path);
            $image->delete();
        }

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $image_name);

                $new_image = new Image();
                $new_image->name = $image_name;
                $new_image->cliente_id = $request->cliente_id;

                $new_image->save();
            }

            return response()->json([
                'message' => 'Image updated successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'No valid image was send'
        ], 400);
    }
}

