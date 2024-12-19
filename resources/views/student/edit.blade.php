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
                    <label for="college"> الكلية</label>
                    <input type="text" value="{{ auth()->user()->college->name }}" readonly name="college"
                        class="form-control">
                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="department">القسم</label>
                    <select name="department" id="department" class="form-control">
                        <option value="{{ $student->department }}" {{ old('department') == '' ? 'selected' : '' }}>{{ $student->department }}</option>
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
                    <label for="program">البرنامج</label>
                    <select name="program" id="program" class="form-control">
                        <option value="{{ $student->program }}" {{ old('program') == '' ? 'selected' : '' }}>{{ $student->program }}</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->name }}" {{ old('program') == $program->name ? 'selected' : '' }}>
                            {{ $program->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('program')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="year"> السنة الدراسية</label>
                    <select name="year" id="year" class="form-control">
                        <option value="{{ $student->year }}" {{ old('year') == '' ? 'selected' : '' }}>{{ $student->year }}</option>
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
                    <label for="level">الفرقة</label>
                    <select name="level" id="level" class="form-control">
                        <option value="{{ $student->level }}" {{ old('level') == '' ? 'selected' : '' }}>{{ $student->level }}</option>
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
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="{{ $student->nationality }}" {{ old('nationality') == '' ? 'selected' : '' }}>{{ $student->nationality }}</option>
                        <option value="مصري" {{ old('nationality') == 'مصري' ? 'selected' : '' }}>مصري</option>
                        <option value="وافد" {{ old('nationality') == 'وافد' ? 'selected' : '' }}>وافد</option>
                    </select>
                    @error('nationality')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="language">لغة الدراسة</label>
                    <select name="language" id="language" class="form-control">
                        <option value="{{ $student->language }}" {{ old('language') == '' ? 'selected' : '' }}>{{ $student->language }}</option>
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
                    <select name="status" id="status" class="form-control">
                        <option value="{{ $student->status }}" {{ old('status') == '' ? 'selected' : '' }}>{{ $student->status }}</option>
                        <option value="مقيد" {{ old('status') == 'مقيد' ? 'selected' : '' }}>مقيد</option>
                        <option value="خريج" {{ old('status') == 'خريج' ? 'selected' : '' }}>خريج</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_male_students"> عدد الطلاب الذكور الجدد</label>
                    <input type="number" value="{{ $student->male_freshmen }}" name="male_freshmen"
                        id="new_male_students" class="form-control">
                    @error('male_freshmen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="new_female_students"> عدد الطلاب الاناث الجدد</label>
                    <input type="number" class="form-control" value="{{ $student->female_freshmen }}" name="female_freshmen"
                        id="new_female_students">
                    @error('female_freshmen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remain_male_students"> عدد الطلاب الذكور الباقيين</label>
                    <input type="number" value="{{ $student->male_remain }}" name="male_remain"
                        id="remain_male_students">
                    @error('male_remain')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="remain_female_students"> عدد الطلاب الاناث الباقيين</label>
                    <input type="number" value="{{ $student->female_remain }}" name="female_remain"
                        id="remain_female_students">
                    @error('female_remain')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" name="submit" style="margin-left: -400px;">تعديل</button>
            </form>
        </div>
    </body>

    </html>
@endsection
