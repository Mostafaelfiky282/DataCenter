<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول - جامعة دمنهور</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

</head>

<body>
    <div class="login-container">
        <div class="form">
            <form class="login-form" method="post" action="{{ route('auth.do.login') }}" novalidate>
                @csrf
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>تسجيل الدخول</h2>
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
        <div class="register-link">
            لا تمتلك حساب؟ <a href="{{ url('/register') }}"> انشاء حساب جديد </a>
        </div>
    </div>
</body>

</html>
