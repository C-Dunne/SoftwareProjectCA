<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the release.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new release.
     */
    public function create()
    {
        // $user = Auth::user();
        // $user->authorizeRoles('admin');

        // $labels = Label::all();
        // $artists = Artist::all();

        return view('items.create');
    }

    /**
     * Store a newly created release in storage.
     */
    public function store(Request $request)
    {

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
        ]);
        
        Item::create([
            'title' => $request->title,
            'condition' => $request->condition,
            'description' => $request->description,
            'availability' => $request->availability,
            'category' => $request->category,
            'item_image' => $item_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('items.index');

    //     $user = Auth::user();
    //     $user->authorizeRoles('admin');

    //     if ($request->hasFile('release_image')) {
    //         $image = $request->file('release_image');
    //         $imageName = time() . '.' . $image->extension();
    //         $image->storeAs('public/releases', $imageName);
    //         $release_image_name = 'storage/releases/' . $imageName;
    //     }
        
    //     //debugging line
    //     // dd($request->all());
    //     // $release->artists()->attach($request->artists);

            // $request->validate([
            //     // maximum amnt of characters
            // 'title' => 'required|max:100',
            // 'genre' => 'required',
            // //bail means rules will be validated in the order they are checked. ie it will check file type first, give error if wrong type. then it will check file size
            // 'release_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'date' => 'required',
            // 'type' => 'required',
            // 'tracklist_length' => 'required|max:3',
            // 'label_id' => 'required',
            // 'artist_id' =>['required' , 'exists:artists,id']
            // ]);

    //    $release = Release::create([
    //     'title' => $request->title,
    //     'genre' => $request->genre,
    //     'release_image' => $release_image_name,
    //     'date' => $request->date,
    //     'type' => $request->type,
    //     'tracklist_length' => $request->tracklist_length,
    //     'artist_id' => $request->artist_id,
    //     'label_id' => $request->label_id,
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //    ]);

    //    $release->artists()->attach($request->artist_id);

    //    return to_route('admin.releases.index');
    }

    public function show(Item $item)
    {
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified release.
     */
    public function edit(Item $item)
    {

        return view('items.edit')->with('item', $item);

        // $user = Auth::user();
        // $user->authorizeRoles('admin');

        // // Fetch the selected artist IDs for the release
        // $selectedArtists = $release->artists->pluck('id')->toArray();

        // $labels = Label::all();
        // $artists = Artist::all();
        // return view('admin.releases.edit')->with('release', $release)->with('labels', $labels)->with('artists', $artists)->with('selectedartists', $selectedArtists);
    }
    /**
     * Update the specified release in storage.
     */
    public function update(Request $request, Item $item)
    {

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
        ]);
        
        $item->update([
            'title' => $request->title,
            'condition' => $request->condition,
            'description' => $request->description,
            'availability' => $request->availability,
            'category' => $request->category,
            'item_image' => $item_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('items.show', $item)->with('success','Item updated successfully');

        // $user = Auth::user();
        // $user->authorizeRoles('admin');

        // $request->validate([
        //     'title' => 'required|max:100',
        //     'tracklist_length' => 'required',
        //     'genre' => 'required',
        //     'date' => 'required',
        //     'type' => 'required',
        //     'release_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'label_id' => 'required',
        //     'artist_id' =>['required' , 'exists:artists,id']
        //     ]);

        //     if ($request->hasFile('release_image')) {
        //         $image = $request->file('release_image');
        //         $imageName = time() . '.' . $image->extension();
        //         $image->storeAs('public/releases', $imageName);
        //         $release_image_name = 'storage/releases/' . $imageName;
        //     }

        //     $release->update([
        //         'title' => $request->title,
        //         'genre' => $request->genre,
        //         'date' => $request->date,
        //         'type' => $request->type,
        //         'tracklist_length' => $request->tracklist_length,
        //         'release_image' => $release_image_name,
        //         'artist_id' => $request->artist_id,
        //         'label_id' => $request->label_id,
        //        ]);

        //        $release->artists()->detach();
        //        $release->artists()->attach($request->artist_id);

        //        return to_route('admin.releases.show', $release)->with('success','Release updated successfully');

    }

    /**
     * Remove the specified release from storage.
     */
    public function destroy(Item $item)
    {

        // $user = Auth::user();
        // $user->authorizeRoles('admin');

        $item->delete();

        return to_route('items.index', $item)->with('success','Item deleted successfully');
    }
}
