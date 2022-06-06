<?php

namespace App\Http\Livewire\Admin\Users;

use Illuminate\Support\Facades\Validator;

use Livewire\Component;
use App\Models\User;

class ListUsers extends Component
{
    public $state = [];

    public $user = null;

    public $showEditModal = false;

    public $userIdBeingRemoved = false;

    // Show Add Modal
    public function addNew(){
        $this->showEditModal = false;
        $this->state = [];
        $this->dispatchBrowserEvent("show-form");
    }

    // Create User
    public function createUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();
        
        $validatedData['password'] = bcrypt($validatedData['password']); 
        User::create($validatedData);

        $this->dispatchBrowserEvent("hide-form", ['message'=> 'User added successfully!']);

    }

    // Edit User
    public function editUser(User $user){
        $this->showEditModal = true;
        $this->state = $user->toArray();
        $this->user = $user;
        $this->dispatchBrowserEvent("show-form");
    }

    // Update User
    public function updateUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();
            
        if(!empty($validatedData['password'])){
                $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $this->user->update($validatedData);

        $this->dispatchBrowserEvent("hide-form", ['message'=> 'User edited successfully!']);
    }

    public function confirmUserRemoval($userID){
        $this->userIdBeingRemoved = $userID;
       
        $this->dispatchBrowserEvent("show-delete-modal");
    }

    public function deleteUser(){
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent("hide-delete-modal", ['message'=> 'User deleted successfully!']);
    }

    // List Users
    public function render()
    {   
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', [
            'users'=> $users
        ]);
    }
}
