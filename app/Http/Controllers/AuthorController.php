<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Tables\Authors;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class AuthorController extends Controller
{
    //
    public function index()
    {
        return view('author.index',[
            'author' => Authors::class,
        ]);
    }

    public function create()
    {
        return view('author.create',[
        ]);
    }

    public function edit($author)
    {
        $author = Author::findOrFail($author);
        return view('author.edit',[
            'author' => $author,
        ]);
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        $author->update($data);
        Toast::title('Chỉnh sửa thành công');
        return redirect()->route('authors');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        author::create($data);

        Toast::title('Thêm thành công!');
        return redirect()->route('authors');
    }

    public function destroy(Author $author )
    {
        $author->delete();
        Toast::title('Xóa thành công');
        return redirect()->route('authors');
    }
}
