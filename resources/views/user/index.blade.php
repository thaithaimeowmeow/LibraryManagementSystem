<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quản lý thủ thư') }}
            </h2>
            <Link modal href="{{route('user.create')}}"
                class=" px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md">
            Thêm
            </Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-table :for="$user" striped>
                @cell('action',$user)
                <div class="flex justify-around">
                    <Link modal href="{{route('user.edit',$user->id)}}" class="text-bold text-indigo-500">
                    <b>View</b>
                    </Link>
                    {{-- <Link modal href="{{route('user.edit',$user->id)}}" class="text-bold text-orange-500">
                    <b>Edit</b>
                    </Link> --}}
                    <Link method="DELETE" confirm href="{{route('user.destroy',$user->id)}}" class="text-bold text-red-500">
                    <b>Delete</b>
                    </Link>
                </div>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>