@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="card" dir="rtl">
    <div class="card-header">
      <h3 class="text-center">كل السنوات</h3>
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
            <th>القيمة</th>
            <th>الحالة</th>
            <th>تعديل</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($years as $year )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $year->value }}</td>
                    <td>{{ $year->status }}</td>
                    <td>
                      <a href="{{ route('years.edit', $year->id) }}" class="btn btn-info">تعديل</a>
                    </td>
                    <td>
                      <form method="POST" action="{{ url('years/'.$year->id) }}">
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