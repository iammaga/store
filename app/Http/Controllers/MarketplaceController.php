<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($name = $request->get('name')) {
            $products = Marketplace::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $products = Marketplace::paginate(5);
        }

        return view('marketplace.marketplaces', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('marketplace.marketplace-create', [
            'companies' => $companies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'company_id' => ['required'],
            'price' => ['required'],
            'image' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Marketplace::create($formFields);

        return redirect('/marketplaces')->with('created_message', 'Success created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marketplace $product)
    {
        $companies = Company::all();

        return view('marketplace.marketplace', [
            'product' => $product,
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketplace $product)
    {
        $companies = Company::all();

        return view('marketplace.marketplace-edit', [
            'product' => $product,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketplace $product)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'company_id' => ['required'],
            'price' => ['required'],
            'image' => ['nullable'],
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($formFields);

        return redirect('/marketplaces')->with('updated_message', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketplace $product)
    {
        $product->delete();

        return redirect('/marketplaces')->with('deleted_message', 'Product deleted successfully!');
    }
}
