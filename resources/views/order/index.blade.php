<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quản lý mượn trả') }}
            </h2>
            <Link modal href="{{route('order.create')}}"
                class=" px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md">
            Cho mượn sách
            </Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-splade-table :for="$order" striped>

                @cell('card_id',$order)
                {{$order->card->name}}
                @endcell

                @cell('status',$order)
                @if($order->status == 1)
                <div class="text-red-600">Chưa trả</div>
                @elseif($order->status == 0)
                <div class="text-green-500">Đã trả</div>
                @endif
                @endcell

                @cell('action',$order)
                <div class="flex justify-around">
                    <Link modal href="{{route('order.update',$order)}}" class="text-bold text-indigo-500">
                    <b>View</b>
                    </Link>
                    @if($order->status == 1)
                    <Link method="DELETE" confirm href="{{route('order.destroy',$order)}}"
                        class="text-bold text-red-500 ml-2">
                    <b>Trả sách</b>
                    </Link>
                    @endif
                </div>
                @endcell

            </x-splade-table>

        </div>
    </div>
</x-app-layout>