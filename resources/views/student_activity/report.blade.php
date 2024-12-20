@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1>الانشطة الدولية بالجامعات</h1>
        <form method="post" action="{{ route('student_activity.show') }}">
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
                <label for="النوع"> نوع النشاط</label>
                <select name="type" id="النوع" class="form-control">
                    <option value="">الانشطه </option>
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

            <button type="submit" name="save">عرض</button>
        </form>
    </div>
@endsection
