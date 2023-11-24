<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategories extends Component
{
    use WithPagination;

    public $search;
    public $sortColumn = '';
    public $sortDirection = '';
    public $restriction;

    public $confirmingId;


    /**
     * mount() is only ever called when the component is first mounted
     */
    public function mount()
    {
        $this->search = request()->query('search', '');
    }

    /**
     * Resetting Pagination After Filtering Data
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($column)
    {
        sleep(0.5);

        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
    }

    public function doSomething($id)
    {
        $this->confirmingId = $id;

    }

    public function cancelDelete()
    {
        $this->confirmingId = '';

    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if ($category->guides()->exists()) {
            session()->flash('admin_categories-failed', 'The category cannot be deleted because it contains guides.');

        } else {
            $category->delete();
            session()->flash('admin_categories-message', 'The category has been successfully deleted.');
        }
        return redirect()->to('/admin/categories');
    }


    public function render()
    {
        $categoriesQuery = Category::search($this->search);

        // sort
        if (!empty($this->sortColumn)) {
            $categoriesQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        $admin_categories = $categoriesQuery->paginate(10);

        return view('livewire.show-categories', [
            'admin_categories' => $admin_categories,
        ]);

    }

}
