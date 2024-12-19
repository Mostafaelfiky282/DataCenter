@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <<div class="form-container">
        <h1>بيان اجمالي مكأفات التفوق للطلاب</h1>
        <form method="post" action="{{ route('rewords.create') }}">
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
                <label for="level"> الفرقة</label>
                <select name="level" id="level" class="form-control">
                    <option value=""> الفرقه</option>
                    <option value="اولي"> فرقة اولي</option>
                    <option value="ثانية"> فرقة ثانية</option>
                    <option value="ثالثة"> فرقة ثالثة</option>
                    <option value="رابعة"> فرقة رابعة</option>
                    <option value="خامسة"> فرقة خامسة</option>
                </select>
                @error('level')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="النوع"> نوع المكافأة</label>
                <select name="type" id="النوع" class="form-control">
                    <option value=""> نوع المكافاة</option>
                    <option value="اوائل ثانوية">اوائل ثانوية</option>
                    <option value="فوق 80% "> فوق 80% </option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> عدد الطلاب</label>
                <input type="number" name="male_students_amount" class="form-control">
                @error('male_students_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <label for="level"> عدد الطالبات </label>
                <input type="number" name="female_students_amount" class="form-control">
                @error('female_students_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            
            <div class="form-group">
                <label for="level"> المبلغ لكل طالب</label>
                <input type="number" name="price" class="form-control">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <button type="submit" name="save">حفظ</button>
        </form>
        </div>
    @endsection
