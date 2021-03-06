<div>
    <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mb-2" wire:click.prevent="addNew">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add New
                    </button>
                </div>
            <div class="card">
              <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                              <a href="#" wire:click.prevent="editUser({{$user}})">
                                  <i class="fa fa-edit mr-2"></i>
                              </a>

                              <a href="#" wire:click.prevent="confirmUserRemoval({{$user->id}})">
                                  <i class="fa fa-trash text-danger"></i>
                              </a>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

        <!-- Modal -->
        <div class="modal fade" id="form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
          <div class="modal-dialog">
            <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser': 'createUser'}}">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        @if($showEditModal)
                            <span>Edit User</span>
                        @else
                            <span>Add New User</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="name" 
                            placeholder="Enter Name"
                            wire:model.defer="state.name">

                        @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            placeholder="Enter Email"
                            wire:model.defer="state.email">

                        @error("email")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="text" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            placeholder="Enter Password"
                            wire:model.defer="state.password">

                        @error("password")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                      </div>
                      <div class="form-group">
                        <label for="password_confirmation ">Comfirm Password</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="password_confirmation" 
                            placeholder="Enter Password Confirmation"
                            wire:model.defer="state.password_confirmation">

                        @error("passwordConfirmation")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        @if($showEditModal)
                            <span>Save Changes</span>
                        @else
                            <span>Save</span>
                        @endif
                    </button>
                  </div>
                </div>
            </form>
          </div>
        </div>


        <div class="modal fade" id="cofirmationForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
          <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">Are you sure to delete the user? </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteUser">
                        <i class="fas fa-trash mr-1"></i>
                         Delete User
                    </button>
                  </div>
                </div>
          </div>
        </div>

  </div>
</div>
