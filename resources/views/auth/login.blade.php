<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول - جامعة دمنهور</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

</head>

<body>

    <div class="form">
        <div class="login">
            <form class="login-form" method="post" action="{{ route('auth.do.login') }}" novalidate>
                @csrf
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul dir="ltr">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-center">تسجيل الدخول</h2>
                <div class="input-group">
                    <span class="icon"><i class="fas fa-envelope"></i></span>

                    <input type="email" id="email" name="email" placeholder="البريد الإلكتروني" />
                </div>

                <div class="input-group">
                    <span class="icon"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" placeholder="كلمة المرور" />
                </div>


                <button type="submit">تسجيل الدخول</button>
            </form>
        </div>

        <div class="logo">
            <img src="{{ asset('images/R.png') }}">
        </div>
    </div>
</body>

</html>
