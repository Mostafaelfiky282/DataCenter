@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1>الانشطه الطلابيه بالجامعات</h1>
        <form method="post" action="{{  route('student_activity.update', $student_ac->id) }}">
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
                <label for="type"> النوع</label>
                <select name="type" id="type" class="form-control">
                    <option value="{{$student_ac->type}}">{{$student_ac->type}} </option>
                    <option value="انشطة الاسر">انشطة الاسر</option>
                    <option value="الانشطه الرياضية">الانشطه الرياضيه</option>
                    <option value="الانشطه الثقافية والفنية">الانشطة الثقافيه والفنيه</option>
                    <option value="الانشطه الاجتماعيه والرحلات">الانشطه الاجتماعيه والرحلات </option>
                    <option value="انشطة الجوالة والخدمة العامة">انشطة الجوالة والخدمه الاجتماعيه</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="male_student_amount">عدد الطلاب</label>
                <input type="number" id="male_student_amount" class="form-control" value="{{ $student_ac->male_student_amount }}" name="male_student_amount">
                @error('male_student_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="female_student_amount">عدد الطالبات</label>
                <input type="number" id="female_student_amount" class="form-control" value="{{ $student_ac->female_student_amount }}" name="female_student_amount">
                @error('female_student_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="level"> التكلفه بالجنيه </label>
                <input type="number" class="form-control" value="{{$student_ac->price}}" name="price">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" name="save">تعديل</button>
        </form>
    </div>
@endsection
