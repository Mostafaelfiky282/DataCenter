<html>

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/R.png') }}" type="image/x-icon" />
    <title>Damanhour University</title>
    <!-- link of css files -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>

<body>
    <div class="header">
        <div class="image">
            <img src="{{ asset('images/Layer2.png') }}" alt="" />
        </div>
    </div>
    @auth
        <nav class="navbar navbar-expand-lg">
            <div class="container justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="{{ url('/home') }}"><i
                                class="fa-solid fa-house mx-2"></i>الصفحه الرئيسية</a>
                    </li>
                    @if(auth()->user()->role != 'User')
                    <li class="nav-item dropdown px-5">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-computer-mouse"></i>
                            ادخال/تعديل الاحصائيات
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/student-add') }}">ادخال احصائيات الطلاب
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">احصائيات الاداره الهندسيه</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">احصائيات الدراسات العليا</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">الانشطه الدوليه بالجامعات</a>
                            </li>
                            <li><a class="dropdown-item" href="#">الرعايه الطلابيه</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item dropdown px-5">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-file"></i>
                            عرض التقارير
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/report') }}">احصائيات الطلاب </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">احصائيات اعضاء هيئة التدريس</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">المصاريف</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">احصائيات الدراسات العليا</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">الانشطة الدولية بالجامعات</a>
                            </li>
                            <li><a class="dropdown-item" href="#">الرعاية الطلابية</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-5">

                        <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-light ">
                                <i class="fa-solid fa-door-open"></i> خروج
                            </button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-light nav-link text-light ">
                            <i class="fa-solid fa-sign-in-alt"></i> تسجيل الدخول
                        </a>
                    @endauth
                </li>

            </ul>
        </div>
    </nav>

    @yield('content')
    <div class="footer">
        <div class="show">
            <h2 class="fw-bold fs-1">رؤية الجامعة</h2>
            <p>
                تتمحور الرؤية الاستراتيجية لجامعة دمنهور حول بناء <br />
                مركز تنافسي متميز في مجال التعليم <br />والبحث العلمي محليا ودوليا
                والمساهمة الفاعلة في بناء<br />
                مجتمع التعليم (Learning Society) القادر ليس فقط <br />
                على الولوج الي مصادر المعرفة او استيعابها او توظيفها ، بل <br />
                وتوليد معارف ومهارات جديدة ومبتكرة تكرس الهوية <br />
                المصرية والقيم الجامعية. <br /><br />
            </p>
            <h2 class="fw-bold fs-1">رسالة الجامعة</h2>
            <p>
                تسعى الجامعة الي تحقيق الريادة والتميز بين الجامعات <br />
                المصرية والعربية والعالمية من خلال التطوير المستمر في <br />
                مجالات التعليم والبحث العلمي وخدمة المجتمع وتنمية <br />
                البيئة وفقا للمعايير القومية للجودة والاعتماد
            </p>
        </div>
        <div class="logo">
            <img src="{{ asset('images/R.png') }}" alt="logo" />
            <br /><br /><br />
            {{-- <h2 class="fw-bold fs-1">تواصل معنا</h2> --}}
            <br />
            {{-- <div class="icons justify-content-between fs-2">
          <i class="fa-brands fa-square-facebook"></i>
          <i class="fa-brands fa-square-instagram"></i>
          <i class="fa-brands fa-linkedin"></i>
          <i class="fa-brands fa-youtube"></i>
        </div> --}}
        </div>
        <div class="Complaints">
            <h2 class="fw-bold fs-1">منظومة الشكاوي الحكومية</h2>
            <p>
                البوابة الالكترونية لمنظومة الشكاوي تم انشاؤها لتحقيق <br />
                التواصل المباشر مع المواطن المصري عبر تكنولوجيا <br />
                المعلومات والاتصالات ، وذلك لتخفيف المعاناة وسعيا <br />
                للارتقاء بمستوى الخدمات المقدمة له
            </p>
            <h2 class="fw-bold fs-1">16528</h2>
            <br /><br />
            <h2 class="fw-bold fs-1">اتصل بنا الان</h2>
            <p dir="ltr">(002)(045)-3368069</p>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
