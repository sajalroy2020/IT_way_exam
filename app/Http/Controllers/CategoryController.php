<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $data['categories'] = Category::with('children')->whereNull('parent_id')->get();
        $data['all_categories'] = Category::all();

        return view('category', $data);
    }

    public function categoryListAdd(Request $request)
    {
        DB::beginTransaction();

        try {

            if ($request->id != null) {
                $category = Category::find($request->id);
            }else{
                $category = new Category();
            }

            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();

            DB::commit();
            return redirect()->route('category')->with('SUCCESS_MESSAGE', 'Added successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong!');
        }
    }
}
