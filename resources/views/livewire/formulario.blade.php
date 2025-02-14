<div>
    

    <div class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6 mb-8">

        @if ($postCreate['image'])

            <img src="{{$postCreate['image']->temporaryUrl()}}">
            
        @endif


        <form wire:submit="save">
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input class="w-full" 
                        wire:model="postCreate.title"/>
                         
                <x-input-error for="postCreate.title"/>
            </div>



            <div class="mb-4">

                <x-label> 
                    Contenido
                </x-label>

                <x-textarea class="w-full" 
                            wire:model="postCreate.content"></x-textarea>
                <x-input-error for="postCreate.content"/>

            </div>

            <div class="mb-4">
                <x-label>
                    Categoría
                </x-label>

                <x-select class="w-full" wire:model.live="postCreate.category_id">
                    
                    <option value="" disabled>
                        Seleccione una categoría
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach


                </x-select>

                <x-input-error for="postCreate.category_id"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Imagen
                </x-label>
                
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <input 
                        type="file" 
                        wire:model="postCreate.image"
                        wire:key="{{$imageKey}}" 
                        class="dark:bg-gray-800 dark:text-white" >
                    
                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        <div x-text="progress">
                        </div>
                        <progress max="120" x-bind:value="progress"></progress>
                    </div>
                </div>

            </div>


            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox type="checkbox" wire:model="postCreate.tags" value="{{$tag->id}}"/>
                                {{$tag->name}}
                            </label>
                        </li>
                    @endforeach

                </ul>

                <x-input-error for="postCreate.tags"/>

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
    
                        <x-danger-button wire:click="destroy({{$post->id}})">
                            Eliminar
                        </x-danger-button>
                    </div>

                </li>
            @endforeach
        </ul>

    </div>


    <form wire:submit="update">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Actualizar post

            </x-slot>

            <x-slot name="content">

                    <div class="mb-4">
                        <x-label>
                            Nombre
                        </x-label>
                        <x-input class="w-full" 
                                wire:model="postEdit.title"/>
                        <x-input-error for="postEdit.title"/>
                    </div>
        
                    <div class="mb-4">
        
                        <x-label> 
                            Contenido
                        </x-label>
        
                        <x-textarea class="w-full" 
                                    wire:model="postEdit.content"></x-textarea>
                        <x-input-error for="postEdit.content" />
        
                    </div>
        
                    <div class="mb-4">
                        <x-label>
                            Categoría
                        </x-label>
        
                        <x-select class="w-full" wire:model="postEdit.category_id">
                            
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
                                        <x-checkbox type="checkbox" wire:model="postEdit.tags" value="{{$tag->id}}"/>
                                        {{$tag->name}}
                                    </label>
                                </li>
                            @endforeach
        
                        </ul>
        
                    </div>
            </x-slot>

            <x-slot name="footer">

                <div class="flex justify-end">

                    <x-danger-button class="mr-2" wire:click="$set('open', false)">
                        Cancelar

                    </x-danger-button>

                    <x-button>
                        Actualizar
                    </x-button>
                </div>


            </x-slot>
        </x-dialog-modal>
    </form>

    @push('js')
        <script> 
                Livewire.on('alert', function(comment){
                    console.log(comment);
                });
        </script>
    @endpush



</div>
