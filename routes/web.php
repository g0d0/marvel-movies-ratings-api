<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return [
        'name' => 'New Way Marvel Voting Application',
        'timestamp' => now()

    ];
});

Route::middleware('auth:sanctum')->post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken('spa')->plainTextToken;
});

Route::middleware('auth:sanctum')->post('/login', function (Request $request) {
    logger()->info($request->only(['email', 'password']));

    if (Auth::attempt($request->only(['email', 'password']))) {
        return response(["success" => true], 200);
    } else {
        return response(["success" => false], 403);
    }
});
