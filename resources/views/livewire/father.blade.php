<div>
    <h1 class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6 mb-8">
        I'm ur father
        <x-input wire:model.live="name"/>
    </h1>



    <hr class="my-6">

    
    
    
    <div>
        @livewire('counter', [], key('contador-1'))
        @livewire('counter', [], key('contador-2'))
        @livewire('counter', [], key('contador-3'))
        @livewire('counter', [], key('contador-4'))
        @livewire('counter', [], key('contador-5'))

    </div>
</div>
