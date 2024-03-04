<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mượn sách') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-splade-modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg rounded-md drop-shadow-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <x-splade-form :action="route('order.store')" class="space-y-4">

                            <x-splade-select name="card_id" label="Người mượn" :options="$card" option-label="name"
                                option-value="id" choices />

                            <x-splade-select name="book_id" label="Sách" :options="$book" option-label="name"
                                option-value="id" choices multiple />

                            <x-splade-input name="return_date" label="Ngày trả" date />

                            <x-splade-submit label="Thêm" />

                        </x-splade-form>
                        

                    </div>
                </div>
            </div>
        </x-splade-modal>
    </div>
</x-app-layout>