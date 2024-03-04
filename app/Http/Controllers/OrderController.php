<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Card;
use App\Models\Item;
use App\Models\Order;
use App\Tables\Orders;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class OrderController extends Controller
{
            //
            public function index()
            {
                return view('order.index',[
                    'order' => Orders::class,
                ]);
            }
        
            public function create()
            {
                $card = Card::all();
                $books = Book::get()->where('quanity','>',0);

                $book = $books->map(function($book, $key){

                    $book->name = $book->isbn.' - '.$book->name;
                    
                    return $book;
                });
                
                
                return view('order.create',[
                    'card' => $card,
                    'book' => $book,
                ]);
            }
        
            public function edit($order)
            {
                $order = Order::find($order);
                $card = Card::find($order->card_id);


                return view('order.edit',[
                    'order' => $order,
                    'card' => $card,
                ]);
            }
        
            public function update(Request $request, order $order)
            {
                $data = $request->validate([
                    'isbn' => ['required','string'],
                    'name' => ['required','string'],
                    'category_id' => ['required'],
                    'publisher_id' => ['required'],
                    'author_id' => ['required'],
                    'quanity' => ['required'],
                ]);
        
                $order->update($data);
                Toast::title('Chỉnh sửa thành công');
                return redirect()->route('orders');
            }
        
            public function store(Request $request)
            {
                
                
                $order_data = $request->validate([
                    'card_id' => ['required'],
                    'return_date' => ['required'],
                ]);

                $request->validate([
                    'card_id' => ['required'],
                ]);

                

                $order = Order::create($order_data);


                foreach ( $request['book_id'] as $item_parent )
                {
                    Item::create([
                        'order_id' => $order->id,
                        'book_id' => $item_parent,
                    ]);
                    $book = Book::find($item_parent);
                    $book->quanity = $book->quanity-1;
                    $book->save();
                }
        
                Toast::title('Thêm thành công!');
                return redirect()->route('orders');
            }
        
            public function destroy(Order $order )
            {
                $order->status=0;
                $order->save();
                foreach($order->items as $item)
                {
                    $item->book->quanity = $item->book->quanity+1;
                    $item->book->save();
                } 
                Toast::title('Thành công');
                return redirect()->route('orders');
            }
}
