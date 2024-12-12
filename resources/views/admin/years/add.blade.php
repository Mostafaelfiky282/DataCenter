@extends('admin.layout.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="p-4">
        <div class="card card-primary" dir="rtl">
            <div class="card-header">
                <h3 class=" text-center">اضافة سنة</h3>
            </div>
            <form method="POST" action="{{ route('year.create') }}">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success text-center m-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="year">السنة</label>
                        <input type="year" class="form-control" name="value" id="year"
                            placeholder="يجب ان تكون القيمة على شكل 2024/2025">
                    </div>
                    @error('value')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group m-4">
                  <label for="status">اختر الحالة</label>
                  <select id="status" name="status" class="form-control" dir="rtl">
                      <option value="" disabled {{ old('status') ? '' : 'selected' }}>اختر الحالة</option>
                      <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                          مفعل
                      </option>
                      <option value="disabled" {{ old('status') == 'disabled' ? 'selected' : '' }}>
                          غير مفعل
                      </option>
                  </select>
                  @error('status')
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
