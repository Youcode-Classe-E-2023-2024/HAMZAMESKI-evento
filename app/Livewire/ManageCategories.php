<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Category;

use Livewire\WithPagination;

class ManageCategories extends Component
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
        $categories = Category::search($this->search)
            ->orderByDesc('updated_at')
            ->paginate($this->perPage);

        return view('livewire.manage-categories',compact('categories'));
    }

    public $category_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    /*************** category popup create form ****************/
    public function saveCategory()
    {
        $validatedData = $this->validate();

        Category::create($validatedData);
        session()->flash('message','Category Added Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    /*************** category popup update form ****************/
    public function editCategory(int $category_id)
    {
        $category = Category::find($category_id);
        if($category){

            $this->category_id = $category->id;
            $this->name = $category->name;
        }else{
            dd('id is not exist');
        }
    }

    public function updateCategory()
    {
        $validatedData = $this->validate();

        Category::where('id',$this->category_id)->update([
            'name' => $validatedData['name']
        ]);

        session()->flash('message','Category Updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    /*************** category popup delete form ***************/
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
        $this->name = '';
        $this->description = '';
        $this->date = null;
        $this->place = '';
        $this->category = '';
        $this->available_places = '';
        $this->acceptance = '';
    }
}
