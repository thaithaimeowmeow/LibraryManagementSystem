<x-guest-layout>
    <x-auth-card>
        <x-splade-modal>
            <x-splade-form action="{{ route('user.store') }}" class="space-y-4">
                <x-splade-input id="name" type="text" name="name" :label="__('Name')" required autofocus />
                <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />
                <x-splade-input id="password" type="password" name="password" :label="__('Password')" required
                    autocomplete="new-password" />
                <x-splade-input id="password_confirmation" type="password" name="password_confirmation"
                    :label="__('Confirm Password')" required />

                <div class="flex items-center justify-end">

                    <x-splade-submit class="ml-4" :label="__('Thêm')" />
                </div>
            </x-splade-form>
        </x-splade-modal>
    </x-auth-card>
</x-guest-layout>