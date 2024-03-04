<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm thẻ tư viện') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-splade-modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg rounded-md drop-shadow-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <x-splade-form :action="route('card.store')" class="space-y-4">

                            <x-splade-input name="idNumber" label="Căn cước công dân" />

                            <x-splade-input name="name" label="Họ và tên" />

                            <x-splade-input name="birthday" label="Ngày sinh" date />

                            <x-splade-group name="gender" label="Giới tính" inline>
                                <x-splade-radio name="gender" value="male" label="Nam" />
                                <x-splade-radio name="gender" value="female" label="Nữ" />
                            </x-splade-group>

                            <x-splade-input name="nationality" label="Quốc tịch" />

                            <x-splade-input name="placeOfOrigin" label="Quê quán" />

                            <x-splade-input name="placeOfResidence" label="Nơi thường trú" />

                            {{-- <div class="flex">
                                <x-splade-file name="image" accept="image/*" label="Hình ảnh" />
                                <img width="200" v-if="form.image" :src="form.$fileAsUrl('image')" />
                            </div> --}}

                            <x-splade-submit label="Thêm" />

                        </x-splade-form>

                    </div>
                </div>
            </div>
        </x-splade-modal>
    </div>
</x-app-layout>