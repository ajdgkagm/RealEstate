<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeProperty;
use App\Http\Requests\updateImage;
use App\Image;
use App\Property;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index', 'profile', 'reserve']);
    }

    public function index()
    {
        $properties = Property::all();
        return view('property.index', compact('properties'));
    }

    public function profile(Property $property)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        Mapper::map($property->latitude, $property->longitude);

        return view('property.profile', compact('property', 'users'));
    }

    public function create()
    {
        $types = Type::all();
        return view('auth.dashboard.admin.property.create', compact('types'));
    }

    public function store(storeProperty $request)
    {
        if ($this->validateCoordinates($request) !== true) {
            return $this->validateCoordinates($request);
        }

        $property = Property::create($request->all());
        if (!$this->storeImage($request, $property->id)) {
            $property->delete();
            return back()->withInput()->withErrors(['error' => 'Please Upload at least 1 Image']);
        }
        $type = Type::where('name', $request->type)->first();
        $property->types()->attach($type->id);
        return back()->with(['msg' => 'Successfully added property']);
    }

    public function validateCoordinates($request)
    {
        //check if coordinates is not null
        if ($request->coordinates !== null) {
            //fill latitude and longitude based on coordinates
            $coordinates = explode(',', $request->coordinates);
            //check if both coordinates have valid length
            if (!($this->validLength($coordinates[0]) && $this->validLength($coordinates[1]))) {
                return back()->withInput()->withErrors(['error' => 'Invalid Coordinates']);
            }
            $request->request->add(['latitude' => $coordinates[0], 'longitude' => $coordinates[1]]);
        }

        return true;
    }

    public function validLength($number)
    {

        $nums = explode('.', $number);
        if (!isset($nums[0]) || !isset($nums[1])) {
            return false;
        }

        if (strlen((string)$nums[0]) > 10) {
            return false;
        }

        if (strlen((string)$nums[1]) > 7) {
            return false;
        }

        return true;
    }

    public function edit(Property $property)
    {
        Mapper::map($property->latitude, $property->longitude);
        $property = $property->load('images');
        $types = Type::all();
        return view('auth.dashboard.admin.property.edit', compact('property', 'types'));
    }

    public function update(storeProperty $request, Property $property)
    {
        if ($this->validateCoordinates($request) !== true) {
            return $this->validateCoordinates($request);
        }

        if ($request->hasFile('images')) {
            $this->storeImage($request, $property->id);
        }
        $property->update($request->all());

        return back()->with(['msg' => 'Successfully edited property']);
    }

    public function destroy(Request $request)
    {
        $property = Property::findOrFail($request->id);

        foreach ($property->images as $image) {
            Storage::disk('public')->delete('images/property/' . $image->file_name);
            $image->delete();
        }

        Property::destroy($property->id);

        return back()->with(['msg' => 'Successfully deleted Image']);
    }

    /* IMAGES SECTION */

    public function findImage($property_id)
    {
        return Image::where('property_id', $property_id)->count();
    }

    public function storeImage($request, $id)
    {
        $request->title = ($request->title !== null) ? $request->title : '';
        $request->description = ($request->description !== null) ? $request->description : '';

        //@todo add validation for image
        //check if there is an image uploaded
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $ind = $this->findImage($id);
            foreach ($images as $image) {
                ++$ind;
                $image->store('images/property', 'public');
                $name = $image->hashName();

                Image::create([
                    'path'        => 'public/images/property/',
                    'file_name'   => $name,
                    'type'        => 'property',
                    'title'       => $request->title,
                    'description' => $request->description,
                    'position'    => $ind,
                    'property_id' => $id,
                ]);
            }

        } else {
            /*return back()->withInput()->withErrors(['error' => 'Please Upload at least 1 Image']);*/
            return false;
        }

        /*return back()->with(['msg' => 'Successfully added property']);*/
        return true;
    }

    /*    public function updateImage(updateImage $request)
        {
            $request->title = ($request->title !== null) ? $request->title : '';
            $request->description = ($request->description !== null) ? $request->description : '';

            $image = Image::where('type', $request->type)
                ->where('title', $request->title)
                ->where('file_name', $request->file_name)
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
                $path = $segments[4] . '/' . $segments[5] . '/' . $noExt[0];
    //            dd($path);
                $ext = \File::extension($exists);
    //            dd($exists);
            }

    //        return "request has no file";
            $image->update([
                'path'        => $path,
                'ext'         => $ext,
                'type'        => $request->type,
                'title'       => $request->title,
                'description' => $request->description,
                'position'    => $request->position,
            ]);

        }*/
}
