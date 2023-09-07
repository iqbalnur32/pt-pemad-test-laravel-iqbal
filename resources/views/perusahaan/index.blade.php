@extends('main')

@section('page_title', 'Perusahaan')
@section('page_subtitle', 'My Perusahaan Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addPerusahaan"><i class="fa fa-plus"></i> Tambah</button>
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
                <th>Email</th>
                <th>Jenis</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $val)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $val->nama }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->jenis }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#perusahaanEdit{{ $val->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('perusahaan.destroy', $val->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="perusahaanEdit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Perusahaan Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('perusahaan.update', $val->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Email:</label>
                          <input type="email" class="form-control" name="email" value="{{ $val->email }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Bank:</label>
                          <input type="text" class="form-control" name="bank" value="{{ $val->bank }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama Bank:</label>
                          <input type="text" class="form-control" name="bank_name" value="{{ $val->bank_name }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama Rekening Bank:</label>
                          <input type="text" class="form-control" name="bank_rekening" value="{{ $val->bank_rekening }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama:</label>
                          <input type="text" class="form-control" name="nama" value="{{ $val->nama }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Jenis:</label>
                          <input type="text" class="form-control" name="jenis" value="{{ $val->jenis }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nilai:</label>
                          <input type="text" class="form-control" name="nilai" value="{{ $val->nilai }}">
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
  <div class="modal fade" id="addPerusahaan" tabindex="-1" role="dialog" aria-labelledby="addPerusahaan" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPerusahaan">Perusahaan Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('perusahaan.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Bank:</label>
              <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama Rekening Bank:</label>
              <input type="text" class="form-control" name="bank_name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Rekening Bank:</label>
              <input type="text" class="form-control" name="bank_rekening">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis:</label>
              <input type="text" class="form-control" name="jenis" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nilai:</label>
              <input type="text" class="form-control" name="nilai" required>
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