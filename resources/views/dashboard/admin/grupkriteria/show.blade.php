@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sub Kriteria</h1>
  </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
            <div class="card-header font-weight-bold text-primary">
            <a href="{{route('grupkriteria')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a> 
            <span class="float-right">Daftar Sub Kriteria {{$grupkriteria->name}} [{{$grupkriteria->type}}]</span>
        </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupkriteria->sub_grupkriteria as $index => $sub_grupkriteria)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$sub_grupkriteria->name}}</td>
                                <td>{{$sub_grupkriteria->weight}}</td>
                                <td>
                                <a href="{{route('sub_grupkriteria.edit',['id'=>$sub_grupkriteria->id])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{route('sub_grupkriteria.delete',['sub_grupkriteria'=>$sub_grupkriteria->id])}}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="grupkriteria_id" id="grupkriteria_id" aria-describedby="grupkriteria_idHelp" value="{{$grupkriteria->id}}">
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
                <div class="card-header font-weight-bold bg-primary text-light">
                    Tambah Sub Kriteria Baru 
                </div>
                <div class="card-body">
                <form action="{{route('sub_grupkriteria.store')}}" method="POST">
                @csrf
                    <input type="hidden" class="form-control" name="grupkriteria_id" id="grupkriteria_id" aria-describedby="grupkriteria_idHelp" value="{{$grupkriteria->id}}">
                    <div class="form-group">
                      <label for="name">Nama Sub Kriteria</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group">
                      <label for="weight">Bobot Sub Kriteria</label>
                      <input type="number" min="1" max="5" name="weight" class="form-control" id="weight" aria-describedby="weightHelp" placeholder="Min 1, Max 5">
                    </div>
                    <button type="submit" class="btn btn-primary">Input</button>
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