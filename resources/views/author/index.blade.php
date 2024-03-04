<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quản lý tác giả') }}
            </h2>
            <Link modal href="{{route('author.create')}}" class=" px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md">
                Thêm tác giả
            </Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-splade-table :for="$author" striped>

                @cell('category_id')

                
                    
                @endcell

                @cell('action',$card)
                <div class="flex justify-around">
                    <Link modal href="{{route('author.update',$card)}}" class="text-bold text-indigo-500">
                    <b>View</b>
                    </Link>
                    <Link method="DELETE" confirm href="{{route('author.destroy',$card)}}" class="text-bold text-red-500 ml-2">
                    <b>Delete</b>
                    </Link>
                </div>
                @endcell
            </x-splade-table>

        </div>
    </div>
</x-app-layout>