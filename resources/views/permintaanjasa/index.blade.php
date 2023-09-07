@extends('main')

@section('page_title', 'Permintaan Jasa')
@section('page_subtitle', 'My Permintaan Jasa Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addProyek"><i class="fa fa-plus"></i> Tambah</button>
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
                <th>Pekerjaan</th>
                <th>Proyek</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $val)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $val->pekerjaan->nama }}</td>
                <td>{{ $val->proyek->nama }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#proyekEdit{{ $val->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('permintaanjasa.destroy', $val->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="proyekEdit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Permintaan Jasa Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('permintaanjasa.update', $val->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Pekerjaan:</label>
                          <select name="pekerjaan_id" class="form-control" id="">
                            @foreach ($pekerjaan as $val2)
                            <option {{ $val2->id == $val->pekerjaan_id ? 'selected' : '' }} value="{{ $val2->id }}">{{ $val2->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Proyek:</label>
                          <select name="proyek_id" class="form-control" id="">
                            @foreach ($proyek as $val2)
                            <option {{ $val2->id == $val->proyek_id ? 'selected' : '' }} value="{{ $val2->id }}">{{ $val2->nama }}</option>
                            @endforeach
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
  <div class="modal fade" id="addProyek" tabindex="-1" role="dialog" aria-labelledby="addProyek" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProyek">Permintaan Jasa Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('permintaanjasa.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Pekerjaan:</label>
              <select name="pekerjaan_id" class="form-control" id="">
                @foreach ($pekerjaan as $val2)
                <option value="{{ $val2->id }}">{{ $val2->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Proyek:</label>
              <select name="proyek_id" class="form-control" id="">
                @foreach ($proyek as $val2)
                <option value="{{ $val2->id }}">{{ $val2->nama }}</option>
                @endforeach
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

  @section('script')

  @endsection