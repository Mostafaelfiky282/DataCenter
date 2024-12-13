@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="p-4">
    <div class="card card-primary" dir="rtl">
        <div class="card-header">
            <h3 class="text-center">اضافة برنامج</h3>
        </div>
        <form method="POST" action="{{route('program.create')}}">
            @csrf
            @if (session('success'))
                <div class="alert alert-success text-center m-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group m-4">
                <label for="college">اختر الكلية</label>
                <select id="college" name="college" class="form-control" dir="rtl">
                    <option value="" disabled {{ old('college') ? '' : 'selected' }}>اختر الكلية</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" {{ old('college') == $college->id ? 'selected' : '' }}>
                            كلية {{ $college->name }}
                        </option>
                    @endforeach
                </select>
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group m-4">
                <label for="department">اختر القسم</label>
                <select id="department" name="department" class="form-control" dir="rtl">
                    <option value="" disabled {{ old('department') ? '' : 'selected' }}>اختر القسم</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department') == $department->id ? 'selected' : '' }}>
                            قسم {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @error('department')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="program">اسم البرنامج</label>
                    <input type="text" class="form-control" name="program" id="program" placeholder="ادخل اسم البرنامج" value="{{ old('program') }}">
                </div>
                @error('program')
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
