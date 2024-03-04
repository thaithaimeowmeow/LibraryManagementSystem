<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Tables\Publishers;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PublisherController extends Controller
{
    //
    public function index()
    {
        return view('publisher.index',[
            'publisher' => Publishers::class,
        ]);
    }

    public function create()
    {
        return view('publisher.create',[
        ]);
    }

    public function edit($publisher)
    {
        $publisher = Publisher::findOrFail($publisher);
        return view('publisher.edit',[
            'publisher' => $publisher,
        ]);
    }

    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        $publisher->update($data);
        Toast::title('Chỉnh sửa thành công');
        return redirect()->route('publishers');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        publisher::create($data);

        Toast::title('Thêm thành công!');
        return redirect()->route('publishers');
    }

    public function destroy(Publisher $publisher )
    {
        $publisher->delete();
        Toast::title('Xóa thành công');
        return redirect()->route('publishers');
    }
}
