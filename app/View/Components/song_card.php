<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class song_card extends Component
{

    public mixed $id =0;
    public mixed $title ='';
    public mixed $category='';
    public mixed $author='';
    /**
     * Create a new component instance.
     */
    public function __construct( $id, $title, $category,$author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.song_card');
    }
}
