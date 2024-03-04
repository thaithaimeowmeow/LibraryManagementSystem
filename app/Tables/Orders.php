<?php

namespace App\Tables;

use App\Models\Order;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Orders extends AbstractTable
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
        return Order::query();
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
            ->withGlobalSearch(columns: ['id'])
            ->defaultSort('id')
            ->column('action')
            ->column('id', label: 'Phiếu số', sortable: true)
            ->column(key: 'card_id', label: 'Người mượn', sortable: true, searchable: true)
            ->column(key: 'created_at', label: 'Ngày mượn', sortable: true, searchable: true)
            ->column(key: 'return_date', label: 'Ngày trả', sortable: true, searchable: true)
            ->column(key: 'status', label: 'Hiện trạng', sortable: true, searchable: true)



            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
            ->paginate();
    }
}
