<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\CategoryNew as Category;

class CategoryNew extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = $this->category->oldest('ordinal')->where('status', 1)->get();
        return view('components.client.category-new', compact('categories'));
    }
}
