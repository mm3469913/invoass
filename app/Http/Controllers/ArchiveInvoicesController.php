<?php

namespace App\Http\Controllers;

use App\Archive_Invoices;
use Illuminate\Http\Request;
use App\invoices;
class ArchiveInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoices::onlyTrashed()->get();
        return view('Invoices.Archive_Invoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive_Invoices  $archive_Invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Archive_Invoices $archive_Invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive_Invoices  $archive_Invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive_Invoices $archive_Invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive_Invoices  $archive_Invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive_Invoices $archive_Invoices)
    {
        $id = $request->invoice_id;
        $flight = Invoices::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_invoice');
        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive_Invoices  $archive_Invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive_Invoices $archive_Invoices)
    {
        $invoices = invoices::withTrashed()->where('id',$request->invoice_id)->first();
        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/Archive');
   
    }
}
