<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function edit(Image $image)
    {
        return view('auth.dashboard.admin.image.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            /*$imageFile->store('images/property', 'public');*/
            $name = $imageFile->hashName();
            Storage::put("/images/property/$name", file_get_contents($imageFile), 'public');

            Storage::delete('images/property/'.$image->file_name);

            $image->update([
                'file_name'   => $name,
            ]);

            return back()->with(['msg' => 'Successfully edited Image']);
        }

        return back()->with(['error' => 'Failed to Edit Image']);
    }

    public function destroy(Request $request)
    {
        $image = Image::findOrFail($request->id);
        Storage::delete('images/property/'.$image->file_name);
        Image::destroy($image->id);

        return back()->with(['msg' => 'Successfully deleted Image']);
    }
}
