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
            <h1>تعديل احصائيات الطلاب المقيدين</h1>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('students.update', $student->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="department">القسم</label>
                    <select name="department" id="department" class="form-control">
                        <option value="" {{ $student->department == '' ? 'selected' : '' }}>{{ $student->department }}
                        </option>
                        <option value="عام" {{ old('department') == 'عام' ? 'selected' : '' }}>عام</option>
                        <option value="تكنولوجيا المعلومات"
                            {{ old('department') == 'تكنولوجيا المعلومات' ? 'selected' : '' }}>تكنولوجيا المعلومات</option>
                        <option value="علوم الحاسب" {{ old('department') == 'علوم الحاسب' ? 'selected' : '' }}>علوم الحاسب
                        </option>
                        <option value="نظم المعلومات" {{ old('department') == 'نظم المعلومات' ? 'selected' : '' }}>نظم
                            المعلومات</option>
                    </select>
                    @error('department')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">الفرقة</label>
                    <select name="level" id="level" class="form-control">
                        <option value="" {{ $student->level == '' ? 'selected' : '' }}>{{ $student->level }}
                        </option>
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
                    <label for="nationality">الجنسية</label>
                    <select name="nationality" id="nationality">
                        <option value="" {{ $student->nationality == '' ? 'selected' : '' }}>
                            {{ $student->nationality }}</option>
                        <option value="مصري" {{ old('nationality') == 'مصري' ? 'selected' : '' }}>مصري</option>
                        <option value="وافد" {{ old('nationality') == 'وافد' ? 'selected' : '' }}>وافد</option>
                    </select>
                    @error('nationality')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_male_students"> عدد الطلاب الذكور الجدد</label>
                    <input type="number" value="{{ $student->male_freshmen }}" name="male_freshmen"
                        id="new_male_students">
                    @error('new_male_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="new_female_students"> عدد الطلاب الاناث الجدد</label>
                    <input type="number" value="{{ $student->female_freshmen }}" name="female_freshmen"
                        id="new_female_students">
                    @error('new_female_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remain_male_students"> عدد الطلاب الذكور الباقيين</label>
                    <input type="number" value="{{ $student->male_remain }}" name="male_remain" id="remain_male_students">
                    @error('remain_male_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="remain_female_students"> عدد الطلاب الاناث الباقيين</label>
                    <input type="number" value="{{ $student->female_remain }}"name="female_remain"
                        id="remain_female_students">
                    @error('remain_female_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" name="submit" style="margin-left: -400px;">تعديل</button>
            </form>
        </div>
    </body>

    </html>
@endsection
