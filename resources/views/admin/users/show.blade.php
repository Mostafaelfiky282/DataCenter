@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="card" dir="rtl">
    <div class="card-header">
      <h3 class="text-center">كل المستخدمين</h3>
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
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>الكلية</th>
            <th>الدور</th>
            <th>تعديل</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->college->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <a href="{{ route('users.edit',$user->id) }}"  class="btn btn-info">تعديل</a>
                    </td>
                    <td>
                      <form method="POST" action="{{ url('users/'.$user->id) }}">
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