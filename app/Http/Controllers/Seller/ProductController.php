<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use domain\Facades\ProductFacade;

class ProductController extends Controller
{
	
	public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        
		$products['products'] = ProductFacade::index();
        return view('seller.product.index')->with($products);
    }
	
	// Add a new product
    public function create()
    {
        return view('seller.product.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        ProductFacade::store($request);
        return redirect()->route('seller.product.index');
    }

    // Edit a product
    public function edit($id)
    {
        $product = ProductFacade::edit($id);
        return view('seller.product.edit')->with('product', $product);
    }

    // Update a product
    public function update($id, Request $request)
    {
        ProductFacade::update($id, $request);
        return redirect()->route('seller.product.index');
    }

    // Delete a product
    public function delete($product_id)
    {
        ProductFacade::delete($product_id);
        return redirect()->route('seller.product.index')->with('success','Product Deleted');;
    }

    // Set Active
    public function setActive($product_id)
    {
        ProductFacade::setActive($product_id);
        return redirect()->back()->with('success','Product Activated');;
    }

    // Set Inactive
    public function setInactive($product_id)
    {
        ProductFacade::setInactive($product_id);
        return redirect()->back()->with('success','Product Inactivated');;
    }

    // View a product
    public function view($product_id)
    {
        $product = ProductFacade::view($product_id);
        return view('seller.product.view')->with('product', $product);
    }
	
	public function product_config()
    {
        
        return view('seller.product.product_config');
    }
}
