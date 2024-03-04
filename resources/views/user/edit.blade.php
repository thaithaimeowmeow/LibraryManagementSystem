<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-splade-modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg rounded-md drop-shadow-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <x-splade-form method="patch" :default="$user" :action="route('user.update',$user)"
                            class="space-y-4">

                            <x-splade-input name="name" label="Họ và tên" />

                            <x-splade-input name="email" label="E-mail" />

                            <x-splade-submit />

                        </x-splade-form>

                    </div>
                </div>
            </div>
        </x-splade-modal>
    </div>
</x-app-layout>