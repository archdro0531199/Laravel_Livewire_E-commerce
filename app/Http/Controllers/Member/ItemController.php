<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
	protected $user;
	
	public function __construct()
    {
        $this->user = new User();
		$this->product = new Product();
    }
	
    public function index()
    {
		$products = Product::all();
        return view('member.item.index', compact('products'));
    }
	
	public function view($user_id)
    {
        $user = $this->user->find($user_id);
        return view('livewire.view')->with('user', $user);
    }
	
	public function itemview($product_id)
    {
        $product = $this->product->find($product_id);
        return view('livewire.itemview')->with('product', $product);
    }
	
	
	public function checkout()
    {
        
        return view('member.item.checkout');
    }
	/*public function view($product_id)
    {
        return $this->product->find($product_id);
    }*/
}
