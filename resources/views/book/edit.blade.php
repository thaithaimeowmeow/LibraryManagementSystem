<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chỉnh sửa sách') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-splade-modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg rounded-md drop-shadow-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <x-splade-form method="patch" :default="$book" :action="route('book.update',$book)" class="space-y-4">

                            <x-splade-input name="isbn" label="ISBN" />

                            <x-splade-input name="name" label="Tên sách" />

                            <x-splade-select name="category_id" label="Thể loại" :options="$category" option-label="name" option-value="id" choices />
                            
                            <x-splade-select name="publisher_id" label="Nhà xuất bản" :options="$publisher" option-label="name" option-value="id" choices />

                            <x-splade-select name="author_id" label="Tác giả" :options="$author" option-label="name" option-value="id" choices />

                            <x-splade-input name="published_year" type="number" label="Năm xuất bản"/>

                            <x-splade-input name="quanity" type="number" label="Số lượng"/>

                            <x-splade-submit label="Lưu thông tin" />

                        </x-splade-form>

                    </div>
                </div>
            </div>
        </x-splade-modal>
    </div>
</x-app-layout>