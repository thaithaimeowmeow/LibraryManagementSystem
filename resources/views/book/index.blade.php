<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quản lý sách') }}
            </h2>
            <Link modal href="{{route('book.create')}}"
                class=" px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md">
            Thêm sách
            </Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-splade-table :for="$book" striped>


                @cell('category_id',$book)
                {{ $book->category->name}}
                @endcell

                @cell('publisher_id',$book)
                {{ $book->publisher->name}}
                @endcell

                @cell('author_id',$book)
                {{ $book->author->name}}
                @endcell

                @cell('action',$book)
                <div class="flex justify-around">
                    <Link modal href="{{route('book.update',$book)}}" class="text-bold text-indigo-500">
                    <b>View</b>
                    </Link>
                    <Link method="DELETE" confirm href="{{route('book.destroy',$book)}}"
                        class="text-bold text-red-500 ml-2">
                    <b>Delete</b>
                    </Link>
                </div>
                @endcell



            </x-splade-table>

        </div>
    </div>
</x-app-layout>