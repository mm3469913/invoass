<?php

namespace App\Http\Controllers;

use App\invoicess;
use App\sections;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoicessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invocess.invocess');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = sections::all();
        return view('invocess.add_invoice', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        invoicess::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoicess  $invoicess
     * @return \Illuminate\Http\Response
     */
    public function show(invoicess $invoicess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoicess  $invoicess
     * @return \Illuminate\Http\Response
     */
    public function edit(invoicess $invoicess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoicess  $invoicess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoicess $invoicess)
    {
        echo "fmvnflnblfdb";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoicess  $invoicess
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoicess $invoicess)
    {
        //
    }
    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id",$id)->pluck("Product_name","id");
        return json_encode($products);
    }
}
