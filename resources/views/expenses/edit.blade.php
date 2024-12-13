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
                <select name="college" id="college">
                    <option value="{{$expense->college}}"> {{$expense->college}}</option>
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
                    <option value="{{$expense->nationality}}"> {{$expense->nationality}}</option>
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
                    <option value="{{$expense->program}}">{{$expense->program}}</option>
                    <option value="خاص">برنامج خاص</option>
                    <option value=" ساعات معتمده">برنامج ساعات معتمده</option>
                </select>
                @error('program')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="level"> اعدادي</label>
                <input type="number" value="{{$expense->level_zero}}" name="level_zero">
                @error('level_zero')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الاولي</label>
                <input type="number" value="{{$expense->level_one}}" name="level_one">
                @error('level_one')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الثانية</label>
                <input type="number" value="{{$expense->level_two}}" name="level_two">
                @error('level_two')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الثالثة</label>
                <input type="number" value="{{$expense->level_three}}" name="level_three">
                @error('level_three')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الرابعة</label>
                <input type="number" value="{{$expense->level_four}}" name="level_four">
                @error('level_four')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة الخامسة</label>
                <input type="number" value="{{$expense->level_five}}" name="level_five">
                @error('level_five')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="level"> الفرقة السادسة</label>
                <input type="number" value="{{$expense->level_six}}" name="level_six">
                @error('level_six')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" name="save">حفظ</button>
        </form>
    </div>
@endsection
