<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function manage()
    {
        $this->unit = Unit::all();
        return view('admin.unit.manage', ['units'=>$this->unit]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        Unit::addUnit($request);
        return redirect()->back()->with('message', 'New unit Added...');
    }

    public function edit($id){
        $this->unit = Unit::find($id);
        return view('admin.unit.update', ['unit' =>$this->unit]);
    }

    public function update(Request $request, $id)
    {
        Unit::updateInfo($request, $id);
        return redirect()->back()->with('message', 'Update Successfull..');

    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect()->back()->with('message', 'unit deleted..');
    }
}
