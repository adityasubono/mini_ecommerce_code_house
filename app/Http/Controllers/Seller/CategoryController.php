<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Category';
        return view('admin.category.index', compact('page_name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Category';
        $category = Category::all();
        return view('admin.category.createcategory', compact('page_name','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $customMessages = [
            'required' => 'Required Input the name for this category!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {

            $data = new Category();
            $data->name = $request->name;
            $data->save();
            Toastr::success('Category name added successfully', 'Success');
            return redirect('/seller/category-create');

        } catch (\Exception $e) {
            Toastr::error('Category name failed to add', 'Error');
            return redirect('/seller/category-create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $customMessages = [
            'required' => 'Required Input the name for this category!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {

            $data = Category::find($id);
            $data->name = $request->name;
            $data->save();

            Toastr::success('Category name updated successfully', 'Success');
            return redirect('/seller/category-create');

        } catch (\Exception $e) {
            Toastr::error('Category name failed to updated', 'Error');
            return redirect('/seller/category-create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Category::destroy($id);
            Toastr::success('Category name ID: '.$id.' deleted successfully', 'Success');
            return redirect('/seller/category-create');

        } catch (\Exception $e) {
            Toastr::error('Category name '.$id.' failed to deleted', 'Error');
            return redirect('/seller/category-create');
        }
    }
}
