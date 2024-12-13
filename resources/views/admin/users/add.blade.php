@extends('admin.layout.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="p-4">
        <div class="card card-primary" dir="rtl">
            <div class="card-header">
                <h3 class=" text-center">اضافة مستخدم</h3>
            </div>
            <form method="POST" action="{{ route('users.create') }}">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success text-center m-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                
                        <label for="username">اسم المستخدم</label>
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="username"
                            placeholder="ادخل اسم المستخدم">
                 
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-body">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email"
                            placeholder="ادخل البريد الالكتروني ">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-body">
                    <label for="role">اختر الدور</label>
                    <select id="role" name="role" class="form-control" dir="rtl">
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>اختر الدور</option>
                        <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>مستخدم</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>مسؤول</option>
                        <option value="Super-Admin" {{ old('role') == 'Super-Admin' ? 'selected' : '' }}>مسؤول رئيسي
                        </option>
                    </select>

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-body">
                    <label for="college">اختر الكلية</label>
                    <select id="college" name="college_id" class="form-control" dir="rtl">
                        <option value="" disabled {{ old('college') ? '' : 'selected' }}>اختر الكلية</option>
                        @foreach ($colleges as $college)
                            <option value="{{ $college->id }}" {{ old('college') == $college->name ? 'selected' : '' }}>
                                كلية {{ $college->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('college')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="card-body">
                    <label for="password">كلمة المرور</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="كلمة المرور">

                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="card-body">
                    <label for="password_confirmation"> نأكيد كلمة المرور</label>
                    <input type="password" id="password-confirmation" name="password_confirmation" class="form-control"
                        placeholder="تأكيد كلمة المرور">

                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary form-control">اضافة</button>
                </div>
            </form>
        </div>
    </div>
@endsection
