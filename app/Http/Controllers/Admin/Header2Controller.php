<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Header2Request;
use App\Models\Header2;
use Illuminate\Http\Request;

class Header2Controller extends Controller
{
    public function index()
    {
        $items = Header2::latest()->paginate(20);
        return view('admin.header2.index', compact('items'));
    }

    public function create()
    {
        return view('admin.header2.create');
    }

    public function store(Header2Request $request)
    {
        try {
            Header2::create($request->all());
            $type = 'success';
            $msg = 'The Item Has Been Created Successfully';

        } catch (\Exception $exception) {
            $type = 'failed';
            $msg = $exception->getMessage();
        }
        session()->flash($type, $msg);
        return redirect()->route('admin.header2.index');
    }

    public function edit(Header2 $item)
    {
        return view('admin.header2.edit', compact('item'));
    }

    public function update(Header2Request $request, Header2 $item)
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
        return redirect()->route('admin.header2.index');
    }

    public function remove(Request $request)
    {
        try {
            $item = Header2::findOrFail($request->id);
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
