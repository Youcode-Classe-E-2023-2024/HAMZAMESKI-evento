<?php

namespace App\Livewire;

use App\Models\Event;

use App\Models\User;
use Livewire\Component;

use App\Models\Reservation;

use Illuminate\Support\Facades\Mail;

class EventDetails extends Component
{
    public $event, $event_id, $user_id;

    protected function rules()
    {
        return [
            'user_id' => 'required',
            'event_id' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.event-details');
    }

    /*************** Reserve Ticket Form ***************/
    public function reserveTicket(int $event_id)
    {
        $this->event_id = $event_id;
        $this->user_id = auth()->id();
    }

    public function confirmReservation()
    {
        $this->validate();

        $existingReservation = Reservation::where('user_id', $this->user_id)
            ->where('event_id', $this->event_id)
            ->first();

        if ($existingReservation) {
            session()->flash('message', 'You have already reserved a ticket for this event.');
        } else {

            // if the event is automatically accept reservations orders
            if (Event::where('id', $this->event_id)->first()->acceptance == 'automatic') {
                Reservation::create([
                    'user_id' => $this->user_id,
                    'event_id' => $this->event_id,
                    'pending' => '0'
                ]);

                $userId = $this->user_id;
                $event = Event::find($this->event_id);
                Mail::send('emails.ticket', compact('event'), function($message) use ($userId) {
                    $user = auth()->user();
                    $message->to($user->email);
                    $message->subject('Event Ticket');
                });

                // increase number of reservations by one
                Event::where('id', $this->event_id)->increment('nmb_reservations', 1);

                // decrease number of reservations by one
                Event::where('id', $this->event_id)->decrement('available_places', 1);
            }else {
                Reservation::create([
                    'user_id' => $this->user_id,
                    'event_id' => $this->event_id
                ]);
            }

            session()->flash('success', 'Reservation Handled Successfully');

            $this->dispatch('close-modal');
        }

        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->event_id = null;
        $this->user_id = null;
    }
}
