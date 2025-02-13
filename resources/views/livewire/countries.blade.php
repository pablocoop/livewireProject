<div>


    <form class="mb-4" wire:submit="save">
        <x-input
            wire:model="country"
            placeholder="Ingrese un país" 
            wire:keydown.space="increment"/>

        <x-button>
            Agregar
        </x-button>
    </form>
    
    <ul class="list-disc list-inside space-y-2">
        @foreach ($countries as $index => $country)
            <li wire:key="country-{{$index}}">

                <span wire:mouseenter="changeActive('{{$country}}')">
                    {{$index}} {{$country}}
                </span>

                <x-danger-button wire:click="delete({{$index}})">
                    x
                </x-danger-button>

            </li>
        @endforeach
    </ul>

    {{$count}}
</div>
