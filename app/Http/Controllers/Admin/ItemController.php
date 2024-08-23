<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Center;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the item.
     */
    public function index()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $items = Item::with('center')->paginate(12);
        return view('admin.items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $centers = Center::all();

        return view('admin.items.create')->with('centers', $centers);
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/items', $imageName);
            $item_image_name = 'storage/items/' . $imageName;
        }

        $request->validate([
            'title' => 'required',
            'condition' => 'required',
            'description' => 'required|max:500',
            'availability' => 'required',
            'category' => 'required',
            'item_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'center_id' => 'required',
        ]);
        
        Item::create([
            'title' => $request->title,
            'condition' => $request->condition,
            'description' => $request->description,
            'availability' => $request->availability,
            'category' => $request->category,
            'item_image' => $item_image_name,
            'center_id' => $request->center_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('admin.items.index');
    }

    public function show(Item $item)
    {
        return view('admin.items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified item.
     */
    public function edit(Item $item)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $centers = Center::all();
        return view('admin.items.edit', compact('item', 'centers'));

    }
    /**
     * Update the specified item in storage.
     */
    public function update(Request $request, Item $item)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/items', $imageName);
            $item_image_name = 'storage/items/' . $imageName;
        }

        $request->validate([
            'title' => 'required',
            'condition' => 'required',
            'description' => 'required|max:500',
            'availability' => 'required',
            'category' => 'required',
            'center_id' => 'required',
            'item_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $item->update([
            'title' => $request->title,
            'condition' => $request->condition,
            'description' => $request->description,
            'availability' => $request->availability,
            'category' => $request->category,
            'item_image' => $item_image_name,
            'center_id' => $request->center_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('admin.items.show', $item)->with('success','Item updated successfully');
    }

    /**
     * Remove the specified item from storage.
     */
    public function destroy(Item $item)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $item->delete();

        return to_route('admin.items.index', $item)->with('success','Item deleted successfully');
    }
}
