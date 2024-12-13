@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1> بيان بالمصروفات الطلاب الوافدين و البرامج المميزة</h1>
        <form method="post" action="{{route('expenses.show')}}">
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
                    <option value="الحاسبات و المعلومات">الحاسبات و المعلومات</option>
                    <option value="العلوم">العلوم</option>
                </select>
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nationality"> الجنسية</label>
                <select name="nationality" id="nationality">
                    <option value=""> الجنسية</option>
                    <option value="سعودي">سعودي</option>
                    <option value="كويتي">كويتي</option>
                </select>
                @error('nationality')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="program"> البرنامج</label>
                <select name="program" id="program">
                    <option value=""> البرنامج</option>
                    <option value="خاص">برنامج خاص</option>
                    <option value=" ساعات معتمده">برنامج ساعات معتمده</option>
                </select>
                @error('program')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" name="save">عرض</button>
        </form>
    </div>
@endsection
