<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tables\Categories;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('category.index',[
            'category' => Categories::class,
        ]);
    }

    public function create()
    {
        return view('category.create',[
        ]);
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('category.edit',[
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        $category->update($data);
        Toast::title('Chỉnh sửa thành công');
        return redirect()->route('categories');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string'],
        ]);

        Category::create($data);

        Toast::title('Thêm thành công!');
        return redirect()->route('categories');
    }

    public function destroy(Category $category )
    {
        $category->delete();
        Toast::title('Xóa thành công');
        return redirect()->route('categories');
    }
}
