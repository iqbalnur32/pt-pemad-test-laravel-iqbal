@extends('main')

@section('page_title', 'Users')
@section('page_subtitle', 'My Users Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addUsers" ><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <br>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div style="color: red" >{{$error}}</div>
            @endforeach
        @endif
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>  
                <td>{{ $user->email }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#editUsers{{ $user->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('users.destroy', $user->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>                      
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editUsers{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Users Add</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Username:</label>
                          <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Email:</label>
                          <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Password:</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Role: </label>
                          <select name="role" class="form-control" id="">
                            <option value="">-- Pilih Role --</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal Add Users -->
<div class="modal fade" id="addUsers" tabindex="-1" role="dialog" aria-labelledby="addUsers" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUsers">Users Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role: </label>
            <select name="role" class="form-control" id="" required>
              <option value="">-- Pilih Role --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection