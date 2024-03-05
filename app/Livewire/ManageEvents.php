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

    /*************** rss items popup update form ****************/
    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'description' => 'required|string|min:6',
            'category' => 'required',
            'place' => 'required',
            'date' => 'required|date',
            'acceptance' => 'required',
            'available_places' => 'required|integer',
        ];
    }

    public $event_id, $name, $description, $date, $place, $category, $available_places, $acceptance;
    public function editEvent(int $event_id)
    {
        $event = RssItem::find($event_id);
        if($event){

            $this->event_id = $event->id;
            $this->name = $event->name;
            $this->description = $event->description;
            $this->date = $event->date;
            $this->place = $event->place;
            $this->category = $event->category;
            $this->available_places = $event->available_places;
            $this->acceptance = $event->acceptance;
        }else{
            dd('the entered id doesnt exist');
        }
    }

    public function updateRssItem()
    {
        $validatedData = $this->validate();

        RssItem::where('id',$this->rss_item_id)->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'link' => $validatedData['link'],
            'description' => $validatedData['description']
        ]);
        session()->flash('message','Student Updated Successfully');
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
        $this->category = '';
        $this->link = '';
        $this->description = '';
    }

    /*************** rss items popup delete form ***************/
    public function deleteRssItem(int $rss_item_id)
    {
        $this->rss_item_id = $rss_item_id;
    }

    public function destroyRssItem()
    {
        RssItem::find($this->rss_item_id)->delete();
        session()->flash('message','Student Deleted Successfully');
        $this->dispatch('close-modal');
    }

    /*************** rss items popup trend form ****************/
    public function editRssItemTrend(int $rss_item_id)
    {
        $rssItem = RssItem::find($rss_item_id);
        if($rssItem){
            $this->rss_item_id = $rssItem->id;
            $this->trend = $rssItem->trend;

        }else{
            return redirect()->to('/stored-rss-items');
        }
    }

    public function updateRssItemTrend()
    {
        $validatedData = $this->validate([
            'trend' => 'required'
        ]);

        RssItem::where('id', $this->rss_item_id)->update([
            'trend' => $validatedData['trend'],
        ]);

        session()->flash('message', 'RSS Item Trend Updated Successfully');

        $this->dispatch('close-modal');
    }

}

