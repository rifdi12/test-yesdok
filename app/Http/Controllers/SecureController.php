<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SecureController extends Controller
{
	public function profile(Request $request)
	{
		$auth = Auth::user();
		try {
			return response()->json(['status' => 'success', 'data' => $auth]);
		} catch (\Throwable $th) {
			return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
		}
	}
}
