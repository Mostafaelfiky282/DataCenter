@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="p-4">
    <div class="card card-primary" dir="rtl">
        <div class="card-header">
          <h3 class=" text-center">اضافة كلية</h3>
        </div>
        <form method="POST" action="{{route('create-college')}}">
            @csrf
            @if (session('success'))
            <div class="alert alert-success text-center m-4">
                {{ session('success') }}
            </div>
        @endif
          <div class="card-body">
            <div class="form-group">
              <label for="name">اسم الكلية</label>
              <input type="name" class="form-control" name="name" id="name" placeholder="الاسم">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary form-control">اضافة</button>
          </div>
        </form>
      </div>
</div>

@endsection