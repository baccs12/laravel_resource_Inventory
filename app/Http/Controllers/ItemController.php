<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Item;

use Illuminate\Pagination\LengthAwarePagintor;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('item')->paginate(7);
        return view('item.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $items = array(
                'item_name' => $post['item_name'],
                'type' => $post['type'],
                'item_onhand' => $post['item_onhand'],
                'supplier_name' => $post['supplier_name']
            );
        $data = DB::table('item')->insert($items);
        return redirect('item');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table('item')->where('id', $id)->first();
        return view('item.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = $request->all();
        $items = array(
                'item_name' => $post['item_name'],
                'type' => $post['type'],
                'item_onhand' => $post['item_onhand'],
                'supplier_name' => $post['supplier_name']
            );
        $data = DB::table('item')->where('id', $post['id'])->update($items);
        return redirect('item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('item')->where('id', $id)->delete();
        return redirect('item');
    }
}
