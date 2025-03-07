<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class UserTypeController extends Controller
{
    public function index()
    {
        return view ('admin.index');
    }

    public function homepage()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }
        return view ('homepage.index', compact('product','count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }

        return view ('homepage.index', compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }

        return view('homepage.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        toastr()->closeButton()->timeOut(8000)->addSuccess('Product Successfully Added To Cart!');
        return  redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;

            $count = Cart::where('user_id',$userId)->count();

            $cart = Cart::where('user_id',$userId)->get();
        }
        return view('homepage.cart',compact('count','cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);
        $data->delete();

        toastr()->closeButton()->timeOut(8000)->addWarning('Item Successfully Removed!');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id',$userid)->get();
        
        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->closeButton()->timeOut(8000)->addSuccess('Successfuly make an Order!');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Order::where('user_id',$user)->get()->count();
        $order = Order::where('user_id',$user)->get();

        return view('homepage.myorders',compact('count','order'));
    }

    public function stripe($value)
    {
        return view('homepage.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;

            $order->user_id = $userid;
            $order->payment_status = "paid";
            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id',$userid)->get();
        
        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->closeButton()->timeOut(8000)->addSuccess('Successfuly make an Order!');
        return redirect('mycart');
    }

    public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }
        return view ('homepage.shop', compact('product','count'));
    }

    public function why()
    {

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }
        return view ('homepage.why', compact('count'));
    }

    public function testimonial()
    {

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }
        return view ('homepage.testimonial', compact('count'));
    }

    public function contact()
    {

        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id',$userId)->count();
        }
        else
        {
            $count = '';
        }
        return view ('homepage.contact', compact('count'));
    }
}
