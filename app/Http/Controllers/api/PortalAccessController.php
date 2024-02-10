<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalAccessController extends Controller
{
    public function index(Request $request)
    {
        $plateform = $request->portal_name;
        if (auth()->user()->tokenCan($plateform)) {
            // User has the required ability
            return response()->json([
                'message' => 'Access granted',
                'user_data' => $request->user(),
            ]);
        } else {
            // User does not have the required ability
            return response()->json(['message' => 'Access denied'], 403);
        }
    }
}
