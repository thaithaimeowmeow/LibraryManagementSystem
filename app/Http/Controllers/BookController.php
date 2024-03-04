<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Tables\Books;
use Faker\Calculator\Isbn;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class BookController extends Controller
{
        //
        public function index()
        {
            return view('book.index',[
                'book' => Books::class,
            ]);
        }
    
        public function create()
        {
            $category = Category::All();
            $publisher = Publisher::All();
            $author = Author::All();
            return view('book.create',[
                'category' => $category,
                'publisher' => $publisher,
                'author' => $author,

            ]);
        }
    
        public function edit($book)
        {
            $book = book::findOrFail($book);
            $category = Category::All();
            $publisher = Publisher::All();
            $author = Author::All();
            return view('book.edit',[
                'book' => $book,
                'category' => $category,
                'publisher' => $publisher,
                'author' => $author,
            ]);
        }
    
        public function update(Request $request, book $book)
        {
            $data = $request->validate([
                'isbn' => ['required','string'],
                'name' => ['required','string'],
                'category_id' => ['required'],
                'publisher_id' => ['required'],
                'author_id' => ['required'],
                'published_year' => ['required'],
                'quanity' => ['required'],
            ]);
    
            $book->update($data);
            Toast::title('Chỉnh sửa thành công');
            return redirect()->route('books');
        }
    
        public function store(Request $request)
        {
            $data = $request->validate([
                'isbn' => ['required','string'],
                'name' => ['required','string'],
                'category_id' => ['required'],
                'publisher_id' => ['required'],
                'author_id' => ['required'],
                'published_year' => ['required'],
                'quanity' => ['required'],
            ]);

    
            Book::create($data);
    
            Toast::title('Thêm thành công!');
            return redirect()->route('books');
        }
    
        public function destroy(Book $book )
        {
            $book->delete();
            Toast::title('Xóa thành công');
            return redirect()->route('books');
        }
}
