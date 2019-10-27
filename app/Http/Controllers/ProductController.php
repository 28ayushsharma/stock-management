<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //
    }

    public function viewallproducts(Request $request)
    {
      $products =  Product::all();
      return view('product.viewallproducts', compact('products'));
    }

    public function create()
    {
        $allcategory =  Category::all();
        return view('product.addproduct' , compact('allcategory'));

    }
    public function addcategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'category' => 'required|unique:category'
          ]);

          if ($validator->fails())
          {
              return back()->withErrors($validator);
          }else{
            Category::create([
              'category' => $request->input('category')
            ]);
          }
        $allcategory =  Category::all();
          return view('product.addproduct' , compact('allcategory'));

    }

    public function viewproduct(Request $request, $id)
    {
      $productdetails = Product::find($id);
      return view('product.viewproduct', compact('productdetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeproduct(Request $request)
    {
      $validator = Validator::make($request->all(), [
      'name'     => 'required',
      'category' => 'required',
      'quantity' => 'required|numeric',
      'purchased_from' => 'required',
      'date' => 'required',
      'price' => 'required|numeric',
      'reorder_quantity'=> 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();;
        }else{

          Product::create([
            'name'            => $request->input('name') ,
            'category'        => $request->input('category'),
            'quantity'        => $request->input('quantity'),
            'purchased_from'  => $request->input('purchased_from'),
            'date'            => $request->input('date'),
            'price'           => $request->input('price'),
            'reorder_quantity'=> $request->input('reorder_quantity')
          ]);
        }

        return redirect()->route('addproduct');

    }

    public function editproduct($id)
    {
      $allcategory =  Category::all();
      $productdetails = Product::find($id);
      return view('product.editproduct', compact('productdetails','allcategory'));
    }

    public function updateproduct(Request $request ,$id)
    {

      $validator = Validator::make($request->all(), [
      'name'     => 'required',
      'category' => 'required',
      'quantity' => 'required|numeric',
      'purchased_from' => 'required',
      'date'           => 'required',
      'price'          => 'required|numeric',
      'reorder_quantity'=> 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();;
        }else{

          $product = Product::findOrFail($id);
          $product->update([
            'name'            => $request->input('name') ,
            'category'        => $request->input('category'),
            'quantity'        => $request->input('quantity'),
            'purchased_from'  => $request->input('purchased_from'),
            'date'            => $request->input('date'),
            'price'           => $request->input('price'),
            'reorder_quantity'=> $request->input('reorder_quantity')
          ]);
        }

        return redirect()->route('viewallproducts');
    }
    public function sellproduct($id)
    {
      $productdetails = Product::find($id);
      return view('product.sellproduct', compact('productdetails'));
    }

    public function storesales(Request $request ,$id)
    {
      $validator = Validator::make($request->all(), [
      'selling_quantity'     => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();;
        }else{
              $sellingquantity = $request->input('selling_quantity');
              $data = Product::find($id);
              if($sellingquantity <= $data->quantity)
              {
              $newquantity =  $data->quantity -  $sellingquantity;

              $data->update([
                'quantity' => $newquantity
              ]);

              return redirect()->route('viewallproducts');
            }
        }
    }

    public function lowstock()
    {
      $allproduct =  Product::all();
      return view('product.lowstock', compact('allproduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $product =  Product::findOrFail($id);
      $product->delete();

      $products =  Product::all();
      return view('product.viewallproducts', compact('products'));
    }
}
