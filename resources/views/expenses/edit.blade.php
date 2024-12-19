@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1> تعديل المصروفات الطلاب الوافدين و البرامج المميزة</h1>
        <form method="post" action="{{route('expenses.update',$expense->id)}}">
            @csrf
            @method('PUT')
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
                <select name="nationality" id="nationality" class="form-control" >
                    <option value="{{$expense->nationality}}"> {{$expense->nationality}}</option>
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

            <div class="form-group">
                <label for="level"> اعدادي</label>
                <input type="number" value="{{$expense->level_zero}}" class="form-control"  name="level_zero">
                @error('level_zero')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الاولي</label>
                <input type="number" value="{{$expense->level_one}}" class="form-control" name="level_one">
                @error('level_one')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الثانية</label>
                <input type="number" value="{{$expense->level_two}}" class="form-control"  name="level_two">
                @error('level_two')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الثالثة</label>
                <input type="number" value="{{$expense->level_three}}" class="form-control"  name="level_three">
                @error('level_three')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الرابعة</label>  
                <input type="number" value="{{$expense->level_four}}" class="form-control" name="level_four">
                @error('level_four')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الخامسة</label>
                <input type="number" value="{{$expense->level_five}}" class="form-control"  name="level_five">
                @error('level_five')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة السادسة</label>
                <input type="number" value="{{$expense->level_six}}" class="form-control"  name="level_six">
                @error('level_six')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" name="save">تعديل</button>
        </form>
    </div>
@endsection
