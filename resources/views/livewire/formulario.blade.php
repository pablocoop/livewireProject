<div>
    

    <div class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6 mb-8">

        <form wire:submit="save">
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input class="w-full" 
                        wire:model="title" 
                        required/>
            </div>

            <div class="mb-4">

                <x-label> 
                    Contenido
                </x-label>

                <x-textarea class="w-full" 
                            wire:model="content"
                            required></x-textarea>


            </div>

            <div class="mb-4">
                <x-label>
                    Categoría
                </x-label>

                <x-select class="w-full" wire:model="category_id">
                    
                    <option value="" disabled>
                        Seleccione una categoría
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach


                </x-select>
            </div>


            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox type="checkbox" wire:model="selectedTags" value="{{$tag->id}}"/>
                                {{$tag->name}}
                            </label>
                        </li>
                    @endforeach

                </ul>

            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear
                </x-button>
            </div>




        </form>

    </div>

    <div class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6">

        <ul class="list-disc list-inside space-y-2">
            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{$post->id}}">
                    {{$post->title}}

                    <div>
                        <x-button wire:click="edit({{$post->id}})">
                            Editar
                        </x-button>
    
                        <x-danger-button>
                            Eliminar
                        </x-danger-button>
                    </div>

                </li>
            @endforeach
        </ul>

    </div>

    @if ($open)
        {{-- formulario de edicion --}}
        <div class="dark:bg-gray-800 dark:text-white dark:bg-opacity-50 fixed inset-0">
            
            <div class="py-12">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

                    <div class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6">
                        
                        <form wire:submit="update">
                            <div class="mb-4">
                                <x-label>
                                    Nombre
                                </x-label>
                                <x-input class="w-full" 
                                        wire:model="title" 
                                        required/>
                            </div>
                
                            <div class="mb-4">
                
                                <x-label> 
                                    Contenido
                                </x-label>
                
                                <x-textarea class="w-full" 
                                            wire:model="content"
                                            required></x-textarea>
                
                
                            </div>
                
                            <div class="mb-4">
                                <x-label>
                                    Categoría
                                </x-label>
                
                                <x-select class="w-full" wire:model="category_id">
                                    
                                    <option value="" disabled>
                                        Seleccione una categoría
                                    </option>
                
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                
                
                                </x-select>
                            </div>
                
                
                            <div class="mb-4">
                                <x-label>
                                    Etiquetas
                                </x-label>
                
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li>
                                            <label>
                                                <x-checkbox type="checkbox" wire:model="selectedTags" value="{{$tag->id}}"/>
                                                {{$tag->name}}
                                            </label>
                                        </li>
                                    @endforeach
                
                                </ul>
                
                            </div>
                
                            <div class="flex justify-end">

                                <x-danger-button class="mr-2" wire:click="$set('open', false)">
                                    Cancelar

                                </x-danger-button>

                                <x-button>
                                    Actualizar
                                </x-button>
                            </div>
                
                
                
                
                        </form>



                    </div>

                </div>
            </div>

        </div>

    @endif


</div>
