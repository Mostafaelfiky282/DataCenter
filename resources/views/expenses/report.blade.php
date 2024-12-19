@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1> بيان بالمصروفات الطلاب الوافدين و البرامج المميزة</h1>
        <form method="post" action="{{ route('expenses.show') }}">
            @csrf
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group">
                <label for="college"> الكلية</label>
                <input type="text" value="{{ auth()->user()->college->name }}" readonly name="college"
                    class="form-control">
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nationality"> الجنسية</label>
                <select name="nationality" id="nationality" class="form-control">
                    <option value=""> الجنسية</option>
                    <option value="سعودي">سعودي</option>
                    <option value="كويتي">كويتي</option>
                </select>
                @error('nationality')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="program">البرنامج</label>
                <select name="program" id="program" class="form-control">
                    <option value="" {{ old('program') == '' ? 'selected' : '' }}>البرنامج</option>
                    @foreach ($programs as $program)
                    <option value="{{ $program->name }}" {{ old('program') == $program->name ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                    @endforeach
                </select>
                @error('program')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" name="save">عرض</button>
        </form>
    </div>
@endsection
