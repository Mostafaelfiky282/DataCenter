@extends('front.app')

@section('content')
    <!DOCTYPE html>
    <html lang="ar" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>اضافة بيانات الطلاب</title>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    </head>

    <body>
        <div class="form-container">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h1>عرض احصائيات الطلاب </h1>
            <form method="post"
                    action="
                    @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Super-Admin')
                     {{ url('/report-show') }}
                    @else
                        {{ url('/chart') }}
                    @endif
            ">
                @csrf
                <div class="form-group">
                    <label for="department">القسم</label>
                    <select name="department" id="department" class="form-control">
                        <option value="" {{ old('department') == '' ? 'selected' : '' }}>اختر القسم</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->name }}" {{ old('department') == $department->name ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('department')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level">الفرقة</label>
                    <select name="level" id="level" class="form-control">
                        <option value="" {{ old('level') == '' ? 'selected' : '' }}>الفرقة</option>
                        <option value="الاعدادي" {{ old('level') == 'الاعدادي' ? 'selected' : '' }}>الاعدادي</option>
                        <option value="الأولى" {{ old('level') == 'الأولى' ? 'selected' : '' }}>الأولى</option>
                        <option value="الثانية" {{ old('level') == 'الثانية' ? 'selected' : '' }}>الثانية</option>
                        <option value="الثالثة" {{ old('level') == 'الثالثة' ? 'selected' : '' }}>الثالثة</option>
                        <option value="الرابعة" {{ old('level') == 'الرابعة' ? 'selected' : '' }}>الرابعة</option>
                    </select>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="language">لغة الدراسة</label>
                    <select name="language" id="language">
                        <option value="" {{ old('language') == '' ? 'selected' : '' }}>لغة الدراسة</option>
                        <option value="العربية" {{ old('language') == 'العربية' ? 'selected' : '' }}>العربية</option>
                        <option value="الانجليزية" {{ old('language') == 'الانجليزية' ? 'selected' : '' }}>الانجليزية
                        </option>
                    </select>
                    @error('language')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" name="submit" style="margin-left: -400px;"> عرض </button>
        </div>
    </body>

    </html>
@endsection
