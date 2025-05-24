<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {
            $validate = Validator::make($request->all(), [
                'name' => 'required|unique:categories'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }

            $slug = Str::of($request->name)->slug('-');

            $data = Category::create([
                'name' => $request->name,
                'slug' => Str::of($request->name)->slug('-')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'category created',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }

    public function listCategory(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {
            $category = Category::select('id', 'name', 'slug')->get();


            if ($request->wantsJson()) {
                return response()->json([
                    "status" => "success",
                    "data" => $category
                ], 200);
            }

            return view('admin.components.category', compact('category'));
        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {

            $target = Category::find($id);
            if ($target == null) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Category not found"
                ], 404);
            }

            $validate = Validator::make($request->all(), [
                'name' => 'sometimes|required|unique:categories'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }
            $target->update([
                'name' => $request->name,
                'slug' => Str::of($request->name)->slug('-')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'data updated',
                'data' => $target
            ], 201);


        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }


    public function deleteCategory($id)
    {


        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {

            $data = Category::find($id);
            if (!$data) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Category not found"
                ], 404);
            } else {
                $data->delete();

                return response()->json([], 204);
            }

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }


    }
}
