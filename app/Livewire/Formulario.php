<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formulario extends Component
{
    use WithFileUploads;

    public $categories, $tags;

    public $imageKey;
    public $image;


    /* #[Rule('required', message:'El campo categoría es requerido')]
    public $title;

    #[Rule('required')]
    public $content;

    #[Rule('required|exists:categories,id')]
    public $category_id = '';

    #[Rule('required|array')]
    public $selectedTags = []; */

    /* #[Rule([
        'postCreate.title' => 'required',
        'postCreate.content' => 'required',
        'postCreate.category_id' => 'required|exists:categories,id',
        'postCreate.tags' => 'required|array'
    ])] */

    public $postCreate = [
        'title' => '',
        'content' > '',
        'category_id' => '',
        'tags' => [],
        'image' => NULL
    ];

    public $posts;
    public $postEditId = '';

    public $open = false; 

    
    public $postEdit = [
        'title' => '',
        'content' > '',
        'category_id' => '',
        'tags' => [],
        ''
    ];
    
    
    public function rules(){
        return [
            'postCreate.title' => 'required',
            'postCreate.content' => 'required',
            'postCreate.category_id' => 'required|exists:categories,id',
            'postCreate.tags' => 'required|array',
            'postCreate.image' => 'nullable|image|max:1024'
        ];
    }

    public function messages(){
        return [
            'postCreate.title.required' => 'El campo título es requerido'
        ];
    }

    public function validationAttributes(){
        return ['postCreate.category_id' => 'categoría'];
    }

    //ciclo de vida de un componente
    public function mount(){
        $this->categories = Category::all();
        $this->tags = Tag::all(); 

        $this->posts = Post::all();
    }

    //alt: public function updated //updating
    public function updating($property, $value){
        if ($property == 'postCreate.category_id') {
            if ($value > 3) {
                throw new \Exception("No puedes seleccionar esta categoría");
            }
        }
    }

    public function updated($property, $value){

    }

    public function hydrate(){

    }

    public function dehydrate(){

    }

    public function save(){
        $this->validate();
        /* $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'selectedTags' => 'required|array',
        ]); */

        /* $post = Post::create([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content
        ]); */

        $post = Post::create([
            // $this->only('category_id', 'title', 'content')
            'title' => $this->postCreate['title'],
            'content' => $this->postCreate['content'],
            'category_id' => $this->postCreate['category_id']
        ]);
        $post->tags()->attach($this->postCreate['tags']);

        if ($this->postCreate['image']){
            $post->image_path = $this->postCreate['image']->store('posts'); 
            $post->save();
        }


        $this->reset(['postCreate']);
        $this->imageKey = rand();


        $this->posts = Post::all();

        $this->dispatch('post-created', 'Nuevo artículo creado!');

    }

    public function edit($postId){

        $this->resetValidation();


        $this->open=true;

        $this->postEditId = $postId;

        $post = Post::find($postId);

        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();




    }
    

    public function update(){

        $this->validate([
            'postEdit.title' => 'required',
            'postEdit.content' => 'required',
            'postEdit.category_id' => 'required|exists:categories,id',
            'postEdit.tags' => 'required|array'
        ]);

        $post = Post::find($this->postEditId);
        $post->update([
            'category_id' => $this->postEdit['category_id'],
            'title' => $this->postEdit['title'],
            'content' => $this->postEdit['content']
        ]);

        $post->tags()->sync($this->postEdit['tags']);

        $this->reset(['postEditId','postEdit', 'open']);

        $this->posts = Post::all(); 

        $this->dispatch('post-created', 'Artículo actualizado!!');

    }

    public function destroy($postId){

        $post = Post::find($postId);
        $post->delete();
        $this->posts = Post::all(); 

        $this->dispatch('post-created', 'Artículo eliminado!');
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
