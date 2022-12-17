<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return Inertia::render('Admin/Product/Index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();

        return Inertia::render('Admin/Product/Create',['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'required|mimes:png,jpg',
            'price' => 'required',
            'description' => 'required',
        ]);

        $file = $request->file('image');
        $name = uniqid() . $file->getClientOriginalName();
        $file->move(public_path('image/'),$name);

        $image_name = "image/" . $name;
        
        Product::create([
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $image_name,
            'price' => $request->price,
            'description' => $request->description,
            'view_count' => 0,
        ]);

        return redirect()->back()->with('success','Product Create Success');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id);
        File::delete($product->first()->image);
        $product->delete();
        return redirect()->back()->with('success','Delete Success');
    }
}
