<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $model = new User;
        try {
            if ($request->with) {
                $relation = explode(',', $request->with);
                return response()->json(['status' => 'success', 'data' => $model->with($relation)->get()]);
            }
            return response()->json(['status' => 'success', 'data' => $model->get()]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function view(Request $request, string $user)
    {
        $model = new User;
        try {
            if ($request->with) {
                $relation = explode(',', $request->with);
                return response()->json(['status' => 'success', 'data' => $model->with($relation)->find($user)]);
            }
            return response()->json(['status' => 'success', 'data' => $model->find($user)]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
