<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials =  $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', 'min:6'],
            'image'     => ['nullable', 'image','mimes:png,jpg','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->put('images/' . $request->file('image')->hashName(), $request->file('image')->get());
            $credentials['image'] = $request->file('image')->hashName();
        }

        $auth = User::create($credentials);

        Auth::login($auth);

        return to_route('home')->with('success','Register successfully');
    }
}