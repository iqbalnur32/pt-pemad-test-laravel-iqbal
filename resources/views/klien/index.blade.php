@extends('main')

@section('page_title', 'Klien')
@section('page_subtitle', 'My Klien Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addKlien"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <br>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div style="color: red">{{$error}}</div>
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
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($klien as $klien)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $klien->nama }}</td>
                <td>{{ $klien->alamat }}</td>
                <td>{{ $klien->telepon }}</td>
                <td>{{ $klien->email }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#editKlien{{ $klien->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('klien.destroy', $klien->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editKlien{{ $klien->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Klien Add</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('klien.update', $klien->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama:</label>
                          <input type="text" class="form-control" name="nama" value="{{ $klien->nama }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Telepon:</label>
                          <input type="number" class="form-control" name="telepon" value="{{ $klien->telepon }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Email:</label>
                          <input type="email" class="form-control" name="email" value="{{ $klien->email }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Alamat:</label>
                          <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $klien->alamat }}</textarea>
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
  <div class="modal fade" id="addKlien" tabindex="-1" role="dialog" aria-labelledby="addKlien" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKlien">Klien Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('klien.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" name="nama" value="">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Telepon:</label>
              <input type="number" class="form-control" name="telepon" value="">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="email" class="form-control" name="email" value="">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Alamat:</label>
              <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
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

  @section('script')
  
  @endsection