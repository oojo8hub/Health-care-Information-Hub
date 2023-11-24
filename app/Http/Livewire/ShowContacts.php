<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ShowContacts extends Component
{
    use WithPagination;

    public $search;
    public $sortColumn = '';
    public $sortDirection = '';

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

    public function doSomething($id)
    {
        $this->confirmingId = $id;
    }

    public function cancelDelete()
    {
        $this->confirmingId = '';
    }

    public function deleteMessage($id)
    {
        sleep(0.5);

        Contact::destroy($id);

        session()->flash('message-deleted', 'The message has been successfully deleted.');

        return redirect()->to('admin/messages');
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

    public function render()
    {
        $contactQuery = Contact::search($this->search);

        // sort
        if (!empty($this->sortColumn)) {
            $contactQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        // pagination
        $contacts = $contactQuery->paginate(10);

        return view('livewire.show-contacts', [
            'contacts' => $contacts,
        ]);
    }
}
