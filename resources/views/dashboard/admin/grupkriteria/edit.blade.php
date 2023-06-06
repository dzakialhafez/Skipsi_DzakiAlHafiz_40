@extends('dashboard.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header font-weight-bold text-primary">
                    Edit Kriteria
                </div>
                <div class="card-body">
                <form action="{{route('grupkriteria.update',['id' => $grupkriteria->id])}}" method="POST">
                @csrf
                @method('PUT')
                <form>
                    <div class="form-group">
                      <label for="grupkriteria_code">Kode Kelas</label>
                    <input type="text" class="form-control" name="grupkriteria_code" id="grupkriteria_code" aria-describedby="grupkriteria_codeHelp" value="{{$grupkriteria->grupkriteria_code}}">
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Kelas</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$grupkriteria->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                  </form>
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