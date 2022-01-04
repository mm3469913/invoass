<?php

namespace App\Http\Controllers;

use App\invoices_detailses;
use App\invoices;
use App\invoice_attachmentses;
use Illuminate\Support\Facades\Storage;
use File;

use Illuminate\Http\Request;

class InvoicesDetailsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\invoices_detailses  $invoices_detailses
     * @return \Illuminate\Http\Response
     */
    public function show(invoices_detailses $invoices_detailses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoices_detailses  $invoices_detailses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices = invoices::where('id',$id)->first();
        $detailses  = invoices_detailses::where('id_Invoice',$id)->get();
        $attachmentses  = invoice_attachmentses::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','detailses','attachmentses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoices_detailses  $invoices_detailses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices_detailses $invoices_detailses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoices_detailses  $invoices_detailses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoices = invoice_attachmentses::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function get_file($invoice_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->download( $contents);
    }



    public function open_file($invoice_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->file($files);
    }

}
