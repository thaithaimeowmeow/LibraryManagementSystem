<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Users extends AbstractTable
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
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        //Select Filter for books.
        $table
            ->withGlobalSearch(columns: ['id'])
            ->defaultSort('id')
            ->column('action')
            ->column('id',sortable: true,searchable: true)
            ->column('name',sortable: true,searchable: true)
            ->column('email',sortable: true,searchable: true)
            ->column('created_at',sortable: true,searchable: true)
            
            ->withGlobalSearch(columns: ['name', 'email'])

            // ->rowLink( function(User $user){
            //     return route('users.show',$user);
            // } )


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
            ->paginate()
            ;
    }
}
