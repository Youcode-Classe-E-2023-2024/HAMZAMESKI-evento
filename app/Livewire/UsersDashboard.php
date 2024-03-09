<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

use Livewire\WithPagination;

class UsersDashboard extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5;
    public $admin = '';

    public $sortBy = 'name';
    public $sortDirection = 'DESC';

    public function delete(User $user) {
        $user->delete();
    }

    public function render()
    {
        $users = User::search($this->search)
            ->orderByDesc('updated_at')
            ->paginate($this->perPage);

        return view('livewire.users-dashboard',compact('users'));
    }

    /*************** user popup update form ****************/
    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => ['required','email'],
            'password' => 'required|string',
            'role' => ''
        ];
    }

    public $user_id, $name, $email, $password, $role = 'user';
    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){

            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;

        }else{
            return redirect()->to('/users-dashboard');
        }
    }

    public function updateUser()
    {
        $validatedData = $this->validate();

        User::where('id',$this->user_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);
        session()->flash('message','User Updated Successfully');
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
        $this->email = '';
        $this->password = '';
    }

    /*************** user popup delete form ***************/
    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyUser()
    {
        User::find($this->user_id)->delete();
        session()->flash('message','User Deleted Successfully');
        $this->dispatch('close-modal');
    }
    /*************** user role popup form ***************/
    public function editUserRole(int $user_id)
    {
        $user = User::find($user_id);
        if($user){
            $this->user_id = $user->id;
        }else{
            return redirect()->to('/users-dash');
        }
    }

    public function updateUserRole()
    {
        $user = User::where('id', $this->user_id)->first();

        $user->syncRoles([]);

        if($this->role == 'member-lvl1') {
            $user->assignRole('member-lvl1');

        }elseif($this->role == 'member-lvl2') {
            $user->assignRole('member-lvl1');
            $user->assignRole('member-lvl2');

        }elseif($this->role == 'member-lvl3') {
            $user->assignRole('member-lvl1');
            $user->assignRole('member-lvl2');
            $user->assignRole('member-lvl3');
        }elseif($this->role == 'user') {
            $user->assignRole('user');
        }

        session()->flash('message', 'RSS Item Trend Updated Successfully');

        $this->dispatch('close-modal');
    }
}
