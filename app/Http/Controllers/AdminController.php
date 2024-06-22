<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category ()
    {
        $data = Category::paginate(5);

        return view('admin.category',compact('data'));
    }

    public function add_category (Request $request)
    {
       $data = new Category;
       $data-> categoryName = $request->category;
       $data->save();

       toastr()->closeButton()->timeOut(8000)->addSuccess('Category Successfully Added!');
       return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->closeButton()->timeOut(8000)->addWarning('Category Successfully Deleted!');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data-> id= $request->categoryid;
        $data-> categoryName = $request->category;

        $data->save();
        toastr()->closeButton()->timeOut(8000)->addSuccess('Category Successfully Updated!');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('products',$imagename);
            
            $data->image = $imagename;
        }

        $data->save();
        toastr()->closeButton()->timeOut(8000)->addSuccess('Successfully Added New Product!');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);

        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->timeOut(8000)->addWarning('Product Successfully Deleted!');
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();
        return view('admin.update_product', compact('data','category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data-> title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();
        toastr()->closeButton()->timeOut(8000)->addSuccess('Product Details Successfully Updated!');
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $data = $request->search;
        
        $product = Product::where('title','LIKE','%'.$data.'%')->
        orWhere('category','LIKE','%'.$data.'%')->
        orWhere('price','LIKE','%'.$data.'%')->
        orWhere('quantity','LIKE','%'.$data.'%')->
        orWhere('description','LIKE','%'.$data.'%')->paginate(5);

        return view('admin.view_product',compact('product'));
    }

    public function view_orders()
    {
        $data = Order::paginate(5);
        return view('admin.order',compact('data'));
    }

    public function otw($id)
    {
        $data = Order::find($id);
        $data->status = 'On Delivery';
        $data->save();

        toastr()->closeButton()->timeOut(8000)->addSuccess('Status Successfully Updated!');
        return redirect('view_orders');

    }

    public function completed($id)
    {
        $data = Order::find($id);
        $data->status = 'Completed';
        $data->save();

        toastr()->closeButton()->timeOut(8000)->addSuccess('Status Successfully Updated!');
        return redirect('view_orders');

    }

    public function print_pdf($id)
    {
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }

    public function order_search(Request $request)
    {
        $data = $request->search;
        
        $data = Order::where('rec_address','LIKE','%'.$data.'%')->
        orWhere('phone','LIKE','%'.$data.'%')->
        orWhere('status','LIKE','%'.$data.'%')->
        orWhere('name','LIKE','%'.$data.'%')->paginate(5);

        return view('admin.order',compact('data'));
    }
}
