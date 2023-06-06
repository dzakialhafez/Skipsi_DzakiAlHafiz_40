@extends('dashboard.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header font-weight-bold bg-primary text-light">
                    Edit Sub Kriteria
                </div>
                <div class="card-body">
                <form action="{{route('sub_grupkriteria.update',['id'=>$sub_grupkriteria->id])}}" method="POST">
                @csrf
                @method('PUT')
                    <input type="hidden" class="form-control" name="grupkriteria_id" id="grupkriteria_id" aria-describedby="grupkriteria_idHelp" value="{{$sub_grupkriteria->grupkriteria_id}}">
                    <div class="form-group">
                      <label for="name">Sub Kriteria Nama</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$sub_grupkriteria->name}}">
                    </div>
                    <div class="form-group">
                      <label for="weight">Bobot Sub Kriteria</label>
                      <input type="number" min="1" max="5" name="weight" class="form-control" id="weight" aria-describedby="weightHelp" placeholder="Min 1, Max 5" value="{{$sub_grupkriteria->weight}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Input</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
