<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                {{-- @livewire('create-post', [
                    'title' => "Hola Mundo pasado desde la vista",
                    'user' => 1
                ]) --}}
                
                @livewire('formulario')
            </div>
        </div>
    </div>
</x-app-layout>
