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
            <h1>ادخال احصائيات الطلاب</h1>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ url('/student-create') }}">
                @csrf
                <div class="form-group">
                    <label for="college"> الكلية</label>
                    <input type="text" value="{{ auth()->user()->college }}" readonly name="college"
                        class="form-control">
                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="department">القسم</label>
                    <select name="department" id="department" class="form-control">
                        <option value="" {{ old('department') == '' ? 'selected' : '' }}>القسم</option>
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
                    <label for="program">البرنامج</label>
                    <select name="program" id="program" class="form-control">
                        <option value="" {{ old('program') == '' ? 'selected' : '' }}>البرنامج</option>
                        <option value="انتظام" {{ old('program') == 'انتظام' ? 'selected' : '' }}>انتظام</option>
                        <option value="انتساب" {{ old('program') == 'انتساب' ? 'selected' : '' }}>انتساب</option>
                        <option value="انتساب موجه" {{ old('program') == 'انتساب موجه' ? 'selected' : '' }}>انتساب موجه
                        </option>
                        <option value="ذوي احتياجات خاصة" {{ old('program') == 'ذوي احتياجات خاصة' ? 'selected' : '' }}>ذوي
                            احتياجات خاصة
                        </option>
                    </select>
                    @error('program')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="year"> السنة الدراسية</label>
                    <input type="text" value="2024/2025" readonly name="year" class="form-control">
                    @error('year')
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
                        <option value="خريج" {{ old('level') == 'خريج' ? 'selected' : '' }}>خريج</option>
                    </select>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="nationality">الجنسية</label>
                    <select name="nationality" id="nationality">
                        <option value="" {{ old('nationality') == '' ? 'selected' : '' }}>الجنسية</option>
                        <option value="مصري" {{ old('nationality') == 'مصري' ? 'selected' : '' }}>مصري</option>
                        <option value="وافد" {{ old('nationality') == 'وافد' ? 'selected' : '' }}>وافد</option>
                    </select>
                    @error('nationality')
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
                <div class="form-group">
                    <label for="status">الحالة</label>
                    <select name="status" id="status">
                        <option value="" {{ old('status') == '' ? 'selected' : '' }}>الحالة</option>
                        <option value="مقيد" {{ old('status') == 'مقيد' ? 'selected' : '' }}>مقيد</option>
                        <option value="خريج" {{ old('status') == 'خريج' ? 'selected' : '' }}>خريج</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_male_students"> عدد الطلاب الذكور الجدد</label>
                    <input type="number" value="{{ old('new_male_students') }}" name="new_male_students"
                        id="new_male_students">
                    @error('new_male_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="new_female_students"> عدد الطلاب الاناث الجدد</label>
                    <input type="number" value="{{ old('new_female_students') }}" name="new_female_students"
                        id="new_female_students">
                    @error('new_female_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remain_male_students"> عدد الطلاب الذكور الباقيين</label>
                    <input type="number" value="{{ old('remain_male_students') }}" name="remain_male_students"
                        id="remain_male_students">
                    @error('remain_male_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="remain_female_students"> عدد الطلاب الاناث الباقيين</label>
                    <input type="number" value="{{ old('remain_female_students') }}" name="remain_female_students"
                        id="remain_female_students">
                    @error('remain_female_students')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" name="submit" style="margin-left: -400px;">اضافة</button>
            </form>
        </div>
    </body>

    </html>
@endsection
