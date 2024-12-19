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
            <h1>عرض المساعدات المالية </h1>
            <form method="post"
                    action="{{ route('financial.show')}}">
                @csrf  
    
                <div class="form-group">
                    <label for="college"> الكلية</label>
                    <input type="text" value="{{ auth()->user()->college->name }}" readonly name="college"
                        class="form-control">
                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="year">العام الدراسي</label>
                    <select name="year" id="year" class="form-control">
                        <option value="" {{ old('year') == '' ? 'selected' : '' }}>العام الدراسي</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->value }}" {{ old('year') == $year->value ? 'selected' : '' }}>
                                {{ $year->value }}
                            </option>
                        @endforeach
                    </select>
                    @error('year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">نوع المساعدة</label>
                    <select name="type" id="type">
                        <option value="">نوع المساعدة</option>
                        <option value="مساعدات مالية" {{ old('type') == 'مساعدات مالية' ? 'selected' : '' }}>مساعدات مالية
                        </option>
                        <option value="مساعدات عينية" {{ old('type') == 'مساعدات عينية' ? 'selected' : '' }}>مساعدات عينية
                        </option>
                        <option value="مساعدات اجتماعية اخرى"
                            {{ old('type') == 'مساعدات اجتماعية اخرى' ? 'selected' : '' }}>مساعدات اجتماعية اخرى</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" name="submit" style="margin-left: -400px;"> عرض </button>
        </div>
    </body>

    </html>
@endsection