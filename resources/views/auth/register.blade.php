<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - جامعة دمنهور</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="form">
            <form class="login-form" method="POST" action="{{ route('auth.store') }}" novalidate>
                @csrf
                <h2>إنشاء حساب</h2>
                <div class="input-group">
                    <input type="text" id="userName" value="{{ old('name') }}" name="name" class="form-control"
                        placeholder="اسم المستخدم">
                    <span class="icon"><i class="fas fa-user"></i></span>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control"
                        placeholder="البريد الإلكتروني">
                    <span class="icon"><i class="fas fa-envelope"></i></span>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group">
                    <select id="role" name="role" class="form-control" dir="rtl">
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>اختر الدور</option>
                        <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>مستخدم</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>مسؤول</option>
                        <option value="Super-Admin" {{ old('role') == 'Super-Admin' ? 'selected' : '' }}>مسؤول رئيسي
                        </option>
                    </select>
                    <span class="icon"><i class="fas fa-user-tag"></i></span>
                </div>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <select id="college" name="college" class="form-control" dir="rtl">
                        <option value="" disabled {{ old('college') ? '' : 'selected' }}>اختر الكلية</option>
                        <option value="الهندسة" {{ old('college') == 'الهندسة' ? 'selected' : '' }}>كلية الهندسة
                        </option>
                        <option value="الحاسبات و المعلومات"
                            {{ old('college') == 'الحاسبات و المعلومات' ? 'selected' : '' }}>كلية الحاسبات و المعلومات
                        </option>
                        <option value="العلوم" {{ old('college') == 'العلوم' ? 'selected' : '' }}>كلية العلوم</option>
                        <option value="التجارة" {{ old('college') == 'التجارة' ? 'selected' : '' }}>كلية التجارة
                        </option>
                        <option value="الاداب" {{ old('college') == 'الاداب' ? 'selected' : '' }}>كلية الآداب</option>
                    </select>
                    <span class="icon"><i class="fas fa-list"></i></span>
                </div>
                @error('college')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="كلمة المرور">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <input type="password" id="password-confirmation" name="password_confirmation" class="form-control"
                        placeholder="تأكيد كلمة المرور">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <button type="submit">إنشاء حساب</button>
            </form>

            <div class="register-link">
                تمتلك حساب؟ <a href="{{ url('/') }}">تسجيل دخول </a>
            </div>
        </div>
    </div>
</body>

</html>
