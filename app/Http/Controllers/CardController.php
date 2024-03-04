<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Tables\Cards;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CardController extends Controller
{
    //
    public function index()
    {
        return view('card.index',[
            'card' => Cards::class,
        ]);
    }

    public function create()
    {
        return view('card.create',[
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idNumber' => ['required','string','max:12','min:12'],
            'name' => ['required','string','max:20'],
            'birthday' => ['required'],
            'gender' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'placeOfOrigin' => ['required', 'string'],
            'placeOfResidence' => ['required', 'string'],
            'image' => [],
        ]);

        Card::create($data);

        Toast::title('Thêm thành công!');
        return redirect()->route('cards');
    }


    public function edit($card)
    {
        $card = Card::findOrFail($card);
        return view('card.edit',[
            'card' => $card,
        ]);
    }

    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'idNumber' => ['required','string','max:12','min:12'],
            'name' => ['required','string','max:20'],
            'birthday' => ['required'],
            'gender' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'placeOfOrigin' => ['required', 'string'],
            'placeOfResidence' => ['required', 'string'],
            'image' => [],
        ]);

        $card->update($data);
        Toast::title('Chỉnh sửa thành công');
        return redirect()->route('cards');
    }
    
    public function destroy(Card $card )
    {
        $card->delete();
        Toast::title('Xóa thành công');
        return redirect()->route('cards');
    }

    
}
