<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Guide;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGuides extends Component
{
    use WithPagination;

    public $search;
    public $sortColumn = '';
    public $sortDirection = '';

    public $count = 10;
    public $confirmingId;

    public $category;
    public $categories;
    public $published;

    /**
     * mount() is only ever called when the component is first mounted
     */
    public function mount()
    {
        $this->search = request()->query('search', '');

        $this->categories = Category::all();
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

    public function deleteGuide($id)
    {
        sleep(0.5);

        Guide::destroy($id);

        session()->flash('guide-deleted', 'The guide has been successfully deleted.');

        return redirect()->to('/guides');
    }

    public function render()
    {
        // search
        $guidesQuery = Guide::search($this->search)
            ->query(function ($builder) {
                $builder
                    ->join('users', 'guides.user_id', '=', 'users.id')
                    ->join('categories', 'guides.category_id', '=', 'categories.id')
                    ->select(['guides.*', 'users.name as author']);
            });

        // filter
        if (!empty($this->published)) {
            $guidesQuery->where('published', $this->published == 'yes' ? 1 : 0);
        }

        if (!empty($this->category)) {
            $guidesQuery->where('categories.name', $this->category);
        }

        // sort
        if (!empty($this->sortColumn)) {
            $guidesQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        // pagination
        $guides = $guidesQuery->paginate(10);

        return view('livewire.show-guides', [
            'guides' => $guides,
            'categories' => $this->categories,
        ]);
    }
}
