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
            <h1>تعديل احصائية المساعدات المالية</h1>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{route('financial.update',$financial->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="college">الكلية</label>
                    <input type="text" value="{{ auth()->user()->college->name }}" readonly name="college" class="form-control">
                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="year">العام الدراسي</label>
                    <select name="year" id="year" class="form-control">
                        <option value="{{$financial->year}}" {{ old('year') == $financial->year ? 'selected' : '' }}>{{$financial->year}}</option>
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
                    <select name="type" id="type" class="form-control">
                        <option value="{{$financial->type}}" {{ old('type') == $financial->type ? 'selected' : '' }}>{{$financial->type}}</option>
                        <option value="مساعدات مالية" {{ old('type') == 'مساعدات مالية' ? 'selected' : '' }}>مساعدات مالية</option>
                        <option value="مساعدات عينية" {{ old('type') == 'مساعدات عينية' ? 'selected' : '' }}>مساعدات عينية</option>
                        <option value="مساعدات اجتماعية اخرى" {{ old('type') == 'مساعدات اجتماعية اخرى' ? 'selected' : '' }}>مساعدات اجتماعية اخرى</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Male_students_amount">عدد الطلاب الذكور</label>
                    <input type="number" class="form-control" value="{{$financial->Male_students_amount}}" name="Male_students_amount" id="Male_students_amount">
                    @error('Male_students_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="female_students_amount">عدد الطلاب الإناث</label>
                    <input type="number" class="form-control" value="{{$financial->female_students_amount}}" name="female_students_amount" id="female_students_amount">
                    @error('female_students_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="price">المبلغ لكل فرد</label>
                    <input type="number" class="form-control" value="{{$financial->price}}" name="price" id="price">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" name="submit" style="margin-left: -400px;">تعديل</button>
            </form>
        </div>
    </body>

    </html>
@endsection
