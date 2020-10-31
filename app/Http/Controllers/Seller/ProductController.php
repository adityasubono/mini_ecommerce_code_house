<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use League\CommonMark\Inline\Element\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $page_name = 'Product List';
        $product = Product::all();

        return view('admin.product.index', compact('page_name', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Product Create';
        $category = Category::all();
        return view('admin.product.product-create', compact('page_name', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'discount' => 'required|integer|lte:100'
        ];

        $customMessages = [
            'name.required' => 'Required input the attribute for this name category!',
            'category.required' => 'Required select the attribute for this type category!',
            'image.required' => 'Required input the attribute for this name image!',
            'price.required' => 'Required input the attribute for this name price!',
            'weight.required' => 'Required input the attribute for this name wight!',
            'stock.required' => 'Required input the attribute for this name stock!',
            'discount.required' => 'Required input discount less than 100 %!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $data = new Product();
            $data->name = $request->name;
            $data->category_id = $request->category;
            $data->info_product = $request->info_product;
            $data->benefits = $request->benefit;
            $data->price = $request->price;
            $data->storage = $request->storage;
            $data->discount = $request->discount;
            $data->stock = $request->stock;
            $data->weight = $request->weight;
            $data->volume = $request->volume;
            Toastr::success('Product name added successfully', 'Success');
            $data->save();

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path('/assets/uploads/images/' . $request->category . '/'); // upload path
            $newName = rand(100000, 1012345678987654321) . "." . $extension;
            $file->move($destinationPath, $newName);
            $data->image = $newName;
            $data->slug = $request->name . '(' . $data->id . ')(' . $data->category_id . ')';
            $data->save();

            Toastr::info('Image successfully upload', 'Success');
            return redirect('/seller/product-create');

        } catch (\Exception $e) {
            Toastr::error('Product name failed to add', 'Error');
            return redirect('/seller/product-create');
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
        $page_name = "Edit Product";
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.product-edit', compact('page_name', 'product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->slug = $request->name . '(' . $id . ')(' . $request->category . ')';
            $product->info_product = $request->info_product;
            $product->storage = $request->storage;
            $product->benefits = $request->benefits;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->stock = $request->stock;
            $product->volume = $request->volume;
            $product->weight = $request->weight;


            if (empty($request->file('image'))) {
                $product->image = $product->image;
            } else {
                $path = public_path('/assets/uploads/images/' . $product->category_id . '/' . $product->image);
                if (file_exists($path)) {
                    unlink($path);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $destinationPath = public_path('/assets/uploads/images/' . $request->category . '/'); // upload path
                $newName = rand(100000, 1012345678987654321) . "." . $extension;
                $file->move($destinationPath, $newName);
                $product->image = $newName;
                $product->save();
            }
            Toastr::info('Product successfully update', 'Success');
            return redirect('/seller/product-edit/' . $id);

        } catch (\Exception $e) {
            Toastr::error('Product failed to updated', 'Error');
            return redirect('/seller/product-edit/' . $id);
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
            Product::destroy($id);


            Toastr::info('Product successfully delete', 'Success');
            return redirect('/seller/product');

        } catch (\Exception $e) {
            Toastr::error('Product failed to deleted', 'Error');
            return redirect('/seller/product');
        }
    }
}
