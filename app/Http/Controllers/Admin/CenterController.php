<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Center;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CenterController extends Controller
{
    /**
     * Display a listing of the center.
     */
    public function index()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $centers = Center::paginate(12);

        return view('admin.centers.index')->with('centers', $centers);
    }

    /**
     * Show the form for creating a new center.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.centers.create');
    }

    /**
     * Store a newly created center in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if ($request->hasFile('center_image')) {
            $image = $request->file('center_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/centers', $imageName);
            $center_image_name = 'storage/centers/' . $imageName;
        }

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'address' => 'required|max:150',
            'phone_number' => 'required|max:10',
            'open_hours' => 'required',
            'center_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        Center::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'open_hours' => $request->open_hours,
            'center_image' => $center_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('admin.centers.index');
    }

    public function show(Center $center)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        $items = $center->items;
        return view('admin.centers.show', compact('center', 'items'));
    }

    /**
     * Show the form for editing the specified center.
     */
    public function edit(Center $center)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $centers = Center::all();
        return view('admin.centers.edit')->with('center', $center);

    }

    /**
     * Update the specified center in storage.
     */
    public function update(Request $request, Center $center)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if ($request->hasFile('center_image')) {
            $image = $request->file('center_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/centers', $imageName);
            $center_image_name = 'storage/centers/' . $imageName;
        }

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'address' => 'required|max:150',
            'phone_number' => 'required|max:10',
            'open_hours' => 'required',
            'center_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $center->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'open_hours' => $request->open_hours,
            'center_image' => $center_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('admin.centers.show', $center)->with('success','Center updated successfully');
    }

    /**
     * Remove the specified center from storage.
     */
    public function destroy(Center $center)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $center->items()->delete();
        $center->delete();

        return to_route('admin.centers.index', $center)->with('success','Center deleted successfully');
    }
}
