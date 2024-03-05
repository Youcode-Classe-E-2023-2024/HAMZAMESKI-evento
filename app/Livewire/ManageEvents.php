<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Event;

use Livewire\WithPagination;


class ManageEvents extends Component
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
            ->paginate($this->perPage);

        return view('livewire.manage-events',compact('events'));
    }

    public $event_id, $user_id, $name, $description, $date, $place, $category, $available_places, $acceptance;

    protected function rules()
    {
        return [
            'user_id' => 'required',
            'name' => 'required|min:6',
            'description' => 'required|string|min:6',
            'category' => 'required',
            'place' => 'required',
            'date' => 'required|date',
//            'acceptance' => 'required',
            'available_places' => 'required|integer',
        ];
    }

    /*************** event popup create form ****************/
    public function saveEvent()
    {
        $this->user_id = auth()->user()->id;
        $validatedData = $this->validate();

        Event::create($validatedData);
        session()->flash('message','Event Added Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    /*************** event popup update form ****************/
    public function editEvent(int $event_id)
    {
        $event = Event::find($event_id);
        if($event){

            $this->event_id = $event->id;
            $this->user_id = $event->user_id;
            $this->name = $event->name;
            $this->description = $event->description;
            $this->date = $event->date;
            $this->place = $event->place;
            $this->category = $event->category;
            $this->available_places = $event->available_places;
        }else{
            dd('id is not exist');
        }
    }

    public function updateEvent()
    {
        $validatedData = $this->validate();

        Event::where('id',$this->event_id)->update([
            'user_id' => $validatedData['user_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'place' => $validatedData['place'],
            'category' => $validatedData['category'],
            'available_places' => $validatedData['available_places'],
        ]);

        session()->flash('message','Event Updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->date = null;
        $this->place = '';
        $this->category = '';
        $this->available_places = '';
        $this->acceptance = '';
    }

    /*************** event popup delete form ***************/
    public function deleteEvent(int $event_id)
    {
        $this->event_id = $event_id;
    }

    public function destroyEvent()
    {
        Event::find($this->event_id)->delete();
        session()->flash('message','Event Deleted Successfully');
        $this->dispatch('close-modal');
    }

    /*************** acceptance popup form ****************/
    public function editAcceptance(int $event_id)
    {
        $event = Event::find($event_id);
        if($event){
            $this->event_id = $event->id;
            $this->acceptance = $event->acceptance;

        }else{
            dd('id is not exist');
        }
    }

    public function updateAcceptance()
    {
        $validatedData = $this->validate([
            'acceptance' => 'required'
        ]);

        Event::where('id', $this->event_id)->update([
            'acceptance' => $validatedData['acceptance'],
        ]);

        session()->flash('message', 'Event acceptance Updated Successfully');

        $this->dispatch('close-modal');
    }
}
