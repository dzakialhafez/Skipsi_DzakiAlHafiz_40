@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Data Siswa Kelas 9</h1>
  </div>
                        <form method="GET">
  <div class="form-group">
                                  <label for="grupkriteria_id">Kelas</label>
                                  <select name="grupkriteria_id" class="form-control" style="width: 10rem;">
                                  @foreach ($grupkriteria as $anjay)
                                  <option value='{{$anjay->id}}'>{{$anjay->name}}</option>
@endforeach
                                  </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Cari</button>
                              </form>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header font-weight-bold text-primary">Kumpulan Data Siswa Kelas 9
                <a href="{{route('employe.create')}}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square"></i> Tambah Data</a></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Posisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employes as $index => $employe)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$employe->full_name}}</td>
                                <td>{{$employe->gender}}</td>
                                <td>{{$employe->grupkriteria->name}}</td>
                                <td>{{$employe->birth_date}}</td>
                                <td>{{$employe->address}}</td>
                                <td>{{$employe->position}}</td>
                                <td>
                                
                                    <a href="/dashboard/employe/{{$employe->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/employe/{{$employe->id}}/delete" method="post" style="display:inline;">
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