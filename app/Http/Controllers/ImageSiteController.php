<?php

namespace App\Http\Controllers;

use App\Models\DataSite;
use App\Models\ImageSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageSiteController extends Controller
{
    public function index(DataSite $datasite)
    {
        $images = $datasite->images;
        return view('images.index', compact('images', 'datasite'));
    }

    public function create($dataSiteId)
    {
        $datasite = DataSite::findOrFail($dataSiteId);
        return view('scenes.dataSite.imageSite.create', compact('datasite'));
    }

    public function store(Request $request, $dataSiteId)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'upload_date' => 'required|date',
        ]);

        $datasite = DataSite::findOrFail($dataSiteId);

        $imagePath = $request->file('image')->store('images', 'public');

        $image = new ImageSite();
        $image->data_site_id = $datasite->id;
        $image->description = $request->input('description');
        $image->image_path = $imagePath;
        $image->upload_date = $request->input('upload_date');
        $image->save();

        return redirect()->route('datasites.show', $datasite->id)->with('success', 'Image added successfully.');
    }

    public function show(DataSite $datasite, ImageSite $imagesite)
    {
        return view('images.show', compact('image', 'datasite'));
    }

    public function edit(DataSite $datasite, ImageSite $imagesite)
    {
        return view('images.edit', compact('image', 'datasite'));
    }

    public function update(Request $request, $datasiteId, $imageId)
{
    $request->validate([
        'description' => 'required|string|max:255',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'upload_date' => 'required|date',
    ]);

    $image = ImageSite::findOrFail($imageId);

    $image->description = $request->description;
    $image->upload_date = $request->upload_date;

    if ($request->hasFile('image_path')) {
        // Delete the old image
        if ($image->image_path && Storage::exists('public/' . $image->image_path)) {
            Storage::delete('public/' . $image->image_path);
        }
        // Store the new image
        $imagePath = $request->file('image_path')->store('images', 'public');
        $image->image_path = $imagePath;
    }

    $image->save();

    return redirect()->route('datasites.show', $datasiteId)->with('success', 'Image updated successfully.');
}


    public function destroy(DataSite $datasite, ImageSite $imagesite)
    {
        $imagesite->delete();
        return redirect()->route('datasites.show', $datasite)->with('success', 'Image deleted successfully.');
    }
}
