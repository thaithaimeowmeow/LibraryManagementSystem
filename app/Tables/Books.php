<?php

namespace App\Tables;

use App\Models\Book;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Books extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Book::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
        ->withGlobalSearch(columns: ['name'])
        ->defaultSort('id')
        ->column('action')
        ->column('isbn', sortable: true,searchable: true)
        ->column('name',sortable: true,searchable: true)
        ->column(key:'category_id',label: 'Category',sortable: true,searchable: true)
        ->column(key:'publisher_id',label: 'Publisher',sortable: true,searchable: true)
        ->column(key:'author_id',label: 'Author',sortable: true,searchable: true)
        ->column('quanity',sortable: true,searchable: true)

        ->column('created_at',sortable: true)
        ->column('updated_at',sortable: true)

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
        ->paginate();
    }
}
