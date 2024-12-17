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
                <select name="college" id="college">
                    <option value=""> الكلية</option>
                    <option value=">حاسبات ومعلومات">حاسبات ومعلومات</option>
                    <option value="علوم">علوم</option>
                </select>
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="level"> الفرقة</label>
                <select name="level" id="level">
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
                <select name="type" id="النوع">
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
                <input type="number" name="male_students_amount">
                @error('male_students_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <label for="level"> عدد الطالبات </label>
                <input type="number" name="female_students_amount">
                @error('female_students_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            
            <div class="form-group">
                <label for="level"> المبلغ لكل طالب</label>
                <input type="number" name="price">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <button type="submit" name="save">حفظ</button>
        </form>
        </div>
    @endsection
