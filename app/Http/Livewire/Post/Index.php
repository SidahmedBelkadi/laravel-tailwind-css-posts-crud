<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search='';
    public $queryString = ['search'];

    public function render()
    {

        $query = Post::query();
        if ($this->search)
        {
            $word = "%{$this->search}%";
            $query -> where('title', 'like', $word)
                ->orWhere('description', 'like', $word);
        }
        $posts = $query->paginate(8);

        return view('livewire.post.index', compact('posts'))
        ->extends('home')
        ->section('content');
    }
}
