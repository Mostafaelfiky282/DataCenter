@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="card" dir="rtl">
    <div class="card-header">
      <h3 class="text-center">كل الاقسام</h3>
    </div>
    @if (session('success'))
    <div class="alert alert-success text-center m-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-body" dir="rtl">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>القسم</th>
            <th>اسم الكلية</th>
            <th>تعديل</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->college->name}}</td> 
                    <td>
                      <a  href="{{ route('departments.edit',$department->id) }}"  class="btn btn-info">تعديل</a>
                    </td>
                    <td>
                      <form action="{{ url('departments/'.$department->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">حذف</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody> 
      </table>
    </div>

  </div>
@endsection