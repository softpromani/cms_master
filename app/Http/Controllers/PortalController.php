<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        return view("portal.create_portal");
    }

    public function manage_portal()
    {
        $portals = Portal::all();
        return view('portal.manage_portal',compact('portals'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'portal_name' => 'required|string',
            'url' => 'required|url',
            'portal_desc' => 'required|string',
            'portal_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // Adjust mime types and max size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('portal_image')) {
            $uploadedFile = $request->file('portal_image');
            $imagePath = $uploadedFile->store('portal_images', 'public'); // 'portal_images' is the directory where the image will be stored
        }

        // Create a new Portal instance and save data to the database
        $portal = Portal::create([
            'name' => $request->portal_name,
            'description' => $request->portal_desc,
            'image' => $imagePath,
            'website_url' => $request->url,
        ]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'portal creaed successfully!');
    }
}
