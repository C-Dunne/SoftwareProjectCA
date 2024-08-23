<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $centers = Center::paginate(10);

        return view('user.centers.index')->with('centers', $centers);
    }

    public function show(Center $center)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if (!Auth::id()) {
            return abort(403);
        }

        $items = $center->items;
        return view('user.centers.show', compact('center', 'items'));
    }
}

