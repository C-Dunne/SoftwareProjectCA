<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    /**
     * Display a listing of the item.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $items = Item::paginate(10);
        return view('user.items.index', compact('items'));
    }

    public function show(Item $item)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        
        return view('user.items.show')->with('item', $item);
    }
}
