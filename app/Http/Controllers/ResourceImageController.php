<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateImage;
use Illuminate\Http\Request;

class ResourceImageController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(updateImage $request)
    {
        $request->title = ($request->title !== null) ? $request->title : '';
        $request->description = ($request->description !== null) ? $request->description : '';

        $image = Image::where('type', $request->type)
            ->where('title', $request->title)
            ->where('description', $request->description)
            ->where('position', $request->position)
            ->first();

        $path = $image->path;
        $ext = $image->ext;

        switch ($request->type) {
            case 'property':
                $folder = 'property';
                break;
        }

        if ($request->hasFile('path')) {
            $file = $request->file('path')->store("images/$folder", 'public');
            $exists = Storage::disk('public')->url($file);
//            dd($exists);
            $segments = explode('/', $exists);
            $noExt = explode('.', $segments[6]);
//            dd($segments);
            $path = $segments[4].'/'.$segments[5].'/'.$noExt[0];
//            dd($path);
            $ext = \File::extension($exists);
//            dd($exists);
        }

//        return "request has no file";
        $image->update([
            'path' => $path,
            'ext' => $ext,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'position' => $request->position,
        ]);

        return back();
    }

    public function destroy($id)
    {
        //
    }
}
