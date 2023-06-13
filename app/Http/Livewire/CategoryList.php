<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public $name, $update_name, $update_id;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-list', [
            'categories' => $categories,
        ]);
    }

    public function save()
    {
        Category::create([
            'name' => $this->name,
        ]);

        // $new_category = new Category;
        // $new_category->name = $this->name;
        // $new_category->save();
    }

    public function update()
    {
        $update_category = Category::find($this->update_id);
        $update_category->name = $this->update_name;
        $update_category->save();
    }

    public function select_category($category_id, $category_name)
    {
        $this->update_id = $category_id;
        $this->update_name = $category_name;
    }

    public function delete_category(Category $category)
    {
        $category->delete();
    }
}
