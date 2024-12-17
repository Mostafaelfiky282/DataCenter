@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <div class="form-container">
        <h1>عرض بيان اجمالي مكأفات التفوق للطلاب </h1>
        <form method="post" action="{{ route('rewords.show') }}">
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
                    <option value="حاسبات ومعلومات">حاسبات ومعلومات</option>
                    <option value="علوم">علوم</option>
                </select>
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="level"> الفرقة</label>
                <select name="level" id="level">
                    <option value="">الفرقة</option>
                    <option value="اعدادي"> اعدادي</option>
                    <option value="اولي"> فرقة اولي</option>
                    <option value="ثانية"> فرقة ثانية</option>
                    <option value="ثالثة"> فرقة ثالثة</option>
                    <option value="رابعة"> فرقة رابعة</option>
                    <option value="خامسة"> فرقة خامسة</option>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </select>
            </div>


            <div class="form-group">
                <label for="النوع"> نوع المكافأة</label>
                <select name="type" id="النوع">
                    <option value="">نوع المكافأة</option>
                    <option value="اوائل ثانوية عامة">اوائل ثانوية عامة</option>
                    <option value="فوق ال 80%">فوق ال 80%</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" name="save">عرض</button>
        </form>
    </div>
@endsection
