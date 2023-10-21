<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Header1Request;
use App\Models\Header1;
use Illuminate\Http\Request;

class Header1Controller extends Controller
{
    public function index()
    {
        $items = Header1::latest()->paginate(20);
        return view('admin.header1.index', compact('items'));
    }

    public function create()
    {
        return view('admin.header1.create');
    }

    public function store(Header1Request $request)
    {
        try {
            Header1::create($request->all());
            $type = 'success';
            $msg = 'The Item Has Been Created Successfully';

        } catch (\Exception $exception) {
            $type = 'failed';
            $msg = $exception->getMessage();
        }
        session()->flash($type, $msg);
        return redirect()->route('admin.header1.index');
    }

    public function edit(Header1 $item)
    {
        return view('admin.header1.edit', compact('item'));
    }

    public function update(Header1Request $request, Header1 $item)
    {
        try {
            $item->update($request->all());
            $type = 'success';
            $msg = 'The Item Has Been Updated Successfully';

        } catch (\Exception $exception) {
            $type = 'failed';
            $msg = $exception->getMessage();
        }
        session()->flash($type, $msg);
        return redirect()->route('admin.header1.index');
    }

    public function remove(Request $request)
    {
        try {
            $item = Header1::findOrFail($request->id);
            $item->delete();
            $message = 'The Item Has Been Deleted Successfully';
            session()->flash('success', $message);
            $type=1;
        } catch (\Exception $exception) {
            session()->flash('failed', $exception->getMessage());
            $type=0;
        }
        $alert = view('admin.sections.alert')->render();
        return response()->json([$type, $alert]);
    }
}
