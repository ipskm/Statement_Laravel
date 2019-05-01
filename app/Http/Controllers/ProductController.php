<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$sum_re=Product::where('type','like','รายรับ')->sum('balance');
	$sum_ex=Product::where('type','like','รายจ่าย')->sum('balance');
	$sums = $sum_re - $sum_ex;
	$products = Product::latest()->paginate(5);
        return view('products.index',compact('products','sums'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'detail' => 'required',
            'type' => 'required',
	    'balance' => 'required'
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('products.index')
                        ->with('success','บันทึกรายการสำเร็จ');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
	    'detail' => 'required',
            'type' => 'required',
            'balance' => 'required'
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')
                        ->with('success','แก้ไขและบันทึกสำเร็จ');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','ลบรายการสำเร็จ');
    }
}
