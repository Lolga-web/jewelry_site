<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;

class MenuComposer
{
    protected $categories;
    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Category $categories)
    {
        $this->categories = $categories->all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}