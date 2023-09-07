@extends('main')

@section('page_title', 'Pembayaran Pembelian')
@section('page_subtitle', 'My Pembayaran Pembelian Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addPembayaran"><i class="fa fa-plus"></i> Tambah</button>
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
                <th>Jumlah</th>
                <th>Tagihan ID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $val)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ number_format($val->jumlah) }}</td>
                <td>{{ $val->tagihan->id }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#pembayaranEdit{{ $val->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('pembayaran.destroy', $val->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="pembayaranEdit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Pembayaran Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('pembayaran.update', $val->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Jumlah:</label>
                          <input type="number" class="form-control" name="jumlah" value="{{ $val->jumlah }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Tagihan:</label>
                          <select name="tagihan_id" class="form-control" id="">
                            @foreach ($tagihan as $val2)
                            <option {{ $val2->id == $val->tagihan_id ? 'selected' : '' }} value="{{ $val2->id }}">{{ $val2->id }}</option>
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
  <div class="modal fade" id="addPembayaran" tabindex="-1" role="dialog" aria-labelledby="addPembayaran" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPembayaran">Pembayaran Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('pembayaran.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jumlah:</label>
              <input type="number" class="form-control" name="jumlah">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Tagihan:</label>
              <select name="tagihan_id" class="form-control" id="">
                @foreach ($tagihan as $val2)
                <option value="{{ $val2->id }}">{{ $val2->id }}</option>
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