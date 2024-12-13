@extends('admin.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="p-4">
    <div class="card card-primary" dir="rtl">
        <div class="card-header text-center">
            <h3>تعديل البرنامج</h3>
        </div>
        <form method="POST" action="{{ route('program.update', $program->id) }}">
            @csrf
            @method('PUT')

            @if (session('success'))
                <div class="alert alert-success text-center m-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-group m-4">
                <label for="college">اختر الكلية</label>
                <select id="college" name="college" class="form-control" dir="rtl">
                    <option value="" disabled {{ old('college', $program->college->id) ? '' : 'selected' }}>اختر الكلية</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" {{ old('college', $program->college->id) == $college->id ? 'selected' : '' }}>
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
                    <option value="" disabled {{ old('department', $program->department->id) ? '' : 'selected' }}>اختر القسم</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department', $program->department->id) == $department->id ? 'selected' : '' }}>
                            قسم {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @error('department')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group m-4">
                <label for="program">اسم البرنامج</label>
                <input type="text" value="{{ old('program', $program->name) }}" class="form-control" name="program" id="program" placeholder="ادخل اسم البرنامج">
                @error('program')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary form-control">تعديل</button>
            </div>
        </form>
    </div>
</div>
@endsection
