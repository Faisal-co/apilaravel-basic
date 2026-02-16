<?php
// This file name is changed from AuthenticatedSessionController.php to LoginController.php for better understanding.
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): array
    {
        $request->authenticate();
// if Authentication is successful then the information will be stored in $request->user().
        $user = $request->user();
        $token = $user->createToken('mainToken')->plainTextToken; // Save Password as Encypted Token Not Plain Text.
        return [
            'user' => new UserResource($user),
            'token' => $token
        ];
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->noContent();
    }
}
