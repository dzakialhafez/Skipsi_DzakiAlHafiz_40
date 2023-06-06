@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Kelas</h1>
  </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header font-weight-bold text-primary">Tambah Kelas Baru</div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $grupkriteria)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$grupkriteria->grupkriteria_code}}</td>
                                <td>{{$grupkriteria->name}}</td>
                                <td>
                             
                                    <a href="/dashboard/grupkriteria/{{$grupkriteria->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/grupkriteria/{{$grupkriteria->id}}/delete" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></button>
                                      </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header font-weight-bold text-light bg-primary">
                    Tambah Kelas Baru
                </div>
                <div class="card-body">
                <form action="{{route('grupkriteria.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="grupkriteria_code">Kode Kelas</label>
                      <input type="text" class="form-control" name="grupkriteria_code" id="grupkriteria_code" aria-describedby="grupkriteria_codeHelp">
                      <small id="grupkriteria_codeHelp" class="form-text text-muted">Unique</small>
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Kelas</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{asset('sbadmin2\vendor\datatables\jquery.dataTables.js')}}"></script>
<script src="{{asset('sbadmin2\vendor\datatables\dataTables.bootstrap4.js')}}"></script>
<script>
    $(document).ready(function() {
    $('#data').DataTable();
} );
</script>
@endpush