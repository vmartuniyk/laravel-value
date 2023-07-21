<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <form method="post" action="{{ route('dashboard-form') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="value_a" :value="__('Value A')" />
                            <x-text-input id="value_a" name="value_a" type="text" class="mt-1 block" :value="old('value_a')" required autofocus autocomplete="value_a" />
                            <x-input-error class="mt-2" :messages="$errors->get('value_a')" />
                        </div>

                        <div>
                            <x-input-label for="value_b" :value="__('Value B')" />
                            <x-text-input id="value_b" name="value_b" type="text" class="mt-1 block" :value="old('value_b')" required autofocus autocomplete="value_b" />
                            <x-input-error class="mt-2" :messages="$errors->get('value_b')" />
                        </div>

                        <div>
                            <x-input-label for="value_c" :value="__('Value C')" />
                            <x-text-input id="value_c" name="value_c" type="text" class="mt-1 block" :value="old('value_c')" required autofocus autocomplete="value_c" />
                            <x-input-error class="mt-2" :messages="$errors->get('value_c')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
