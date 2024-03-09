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

        $event = $this->event;

        return view('livewire.accept-events',compact('events', 'event'));
    }

    public $event_id;

    public $event;

    public function displayDetails($event_id)
    {
        $this->event = Event::findOrFail($event_id);
    }

    /*************** accept event popup form ***************/
    public function handleEvent(int $event_id)
    {
        $this->event_id = $event_id;
        $this->event = Event::where('id', $event_id)->first();
    }

    public function acceptEvent()
    {
        Event::find($this->event_id)->update(['is_published' => '1']);

        session()->flash('message','Event Accepted Successfully');
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
