<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Http\Resources\ShortUrlResource;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make([
            'email' => 'required|email',
            'password' => 'required',
        ], $request->only(['email', 'password']));

        if (!Auth::attempt($validator->validated())) {
            return response()->json([
                'error' => "Invalid Credentials..",
            ], 403);
        }

        $token = Auth::user()->createToken()->plainTextToken;

        return response()->json([
            'success' => "Succesfully logged in..",
            'user' => Auth::user(),
            'token' => $token,
        ], 200);
    }
}
