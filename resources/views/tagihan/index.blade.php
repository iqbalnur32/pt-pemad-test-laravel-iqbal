@extends('main')

@section('page_title', 'Tagihan')
@section('page_subtitle', 'My Tagihan Dashboard')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addtagihan"><i class="fa fa-plus"></i> Tambah</button>
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
                <th>Harga</th>
                <th>Penwaran Jasa</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $val)
              @php
                $checkProyekByWhere = App\Models\Proyek::where('id', $val->PenawaranJasa->proyek_id)->first();
                $checkPekerjaanByWhere = App\Models\Pekerjaan::where('id', $val->PenawaranJasa->pekerjaan_id)->first();
              @endphp
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Rp. {{ number_format($val->jumlah) }}</td>
                <td>{{ $checkProyekByWhere->nama }} | {{ $checkPekerjaanByWhere->nama }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Aksi</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <button data-toggle="modal" data-target="#tgihanEdit{{ $val->id }}" class="dropdown-item" href="">Edit</button>
                      <form action="{{route('tagihan.destroy', $val->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="dropdown-item delete">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="tgihanEdit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUsers" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateUsers">Tagihan Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('tagihan.update', $val->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Jumlah:</label>
                          <input type="number" name="jumlah" class="form-control" value="{{ $val->jumlah }}">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Penawaran Jasa:</label>
                          <select name="penawaran_jasa_id" class="form-control" id="">
                            @foreach ($penawaranJasa as $val2)
                            <option {{ $val2->id == $val->penawaran_jasa_id ? 'selected' : '' }} value="{{ $val2->id }}">{{ $val2->proyek->nama }} | {{ $val2->pekerjaan->nama }}</option>
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
  <div class="modal fade" id="addtagihan" tabindex="-1" role="dialog" aria-labelledby="addtagihan" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addtagihan">Tagihan Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tagihan.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jumlah:</label>
              <input type="number" name="jumlah" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Penawaran Jasa:</label>
              <select name="penawaran_jasa_id" class="form-control" id="">
                @foreach ($penawaranJasa as $val2)
                <option value="{{ $val2->id }}">{{ $val2->proyek->nama }} | {{ $val2->pekerjaan->nama }}</option>
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