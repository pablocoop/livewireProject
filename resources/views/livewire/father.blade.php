<div>
    <h1 class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6 mb-8">
        I'm ur father
        <x-input wire:model.live="name"/>
    </h1>



    <hr class="my-6">
    
    
    <div>
        {{-- @livewire('children', [
            'name' => $name
        ]) --}}
        <livewire:children wire:model="name"/>
    </div>
</div>
