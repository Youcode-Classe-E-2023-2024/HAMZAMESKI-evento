<?php

namespace App\Livewire;

use App\Models\Event;

use Livewire\Component;

class EventDetails extends Component
{
    public function render()
    {
        return view('livewire.event-details');
    }

    /*************** reserve ticket form ***************/
     public function reserveTicket(int $event_id)
     {
         dd('reserved');
         $this->event_id = $event_id;
     }

    public function confirmReservation()
    {
        dd('reserved');
//        Event::find($this->event_id)->delete();
//        session()->flash('message','Event Deleted Successfully');
//        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
    }
}
