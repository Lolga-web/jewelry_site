<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Subcategory;

class MenuComposer
{
    protected $categories;
    protected $subcategories;
    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Category $categories, Subcategory $subcategories)
    {
        $this->categories = $categories->all();
        $this->subcategories = $subcategories->all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->categories,
            'subcategories' => $this->subcategories,
        ]);
    }
}