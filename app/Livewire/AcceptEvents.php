<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Event;

use Livewire\WithPagination;


class AcceptEvents extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;

    public $sortBy = 'name';
    public $sortDirection = 'DESC';

    public function setSortBy($field) {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    public function render()
    {
        $events = Event::search($this->search)
            ->orderByDesc('updated_at')
            ->where('is_published', '0')
            ->paginate($this->perPage);

        return view('livewire.accept-events',compact('events'));
    }

    public $category_id;

    protected function rules()
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    /*************** accept event popup form ***************/
    public function deleteCategory(int $category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        Category::find($this->category_id)->delete();
        session()->flash('message','Category Deleted Successfully');
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
    }
}
