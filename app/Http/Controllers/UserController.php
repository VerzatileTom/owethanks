<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $filename = $request->file('photo')->hashName();

        $path = $request->file('photo')
            ->storeAs('photos', $filename);

        auth()->user()->update([
            'verified' => true,
            'photo' => $path
        ]);

        return redirect('/home');
    }
}
