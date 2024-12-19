@extends('front.app')
@section('content')
    <!DOCTYPE html>
    <html lang="ar" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>عن الجامعة</title>
        <link rel="stylesheet" href="style/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>

    <body>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="about">
                <h1>عن الجامعة</h1>
                <p>
                    تأسست جامعة دمنهور بمقتضى القرار الجمهوري رقم 303 بتاريخ 2010-10-26.
                    هذا وتضم الجامعة عدد 12 كلية ومعهدًا للدراسات العليا والبحوث البيئية،
                    لتخدم قطاعات عدة على المستوى التعليمي والبحثي والمجتمعي وفق رؤية الجامعة
                    واستراتيجيتها التعليمية والتدريبية، رافعة شعار "جامعة خادمة للمجتمع بلا أسوار"،
                    لتحقيق أهدافها المنشودة في الارتقاء بسياساتها التعليمية، والمواكبة بين معطيات
                    العلم وخدمة المجتمع، لمواكبة رؤية مصر 2030 لبناء مصر الحديثة. ويرجع تاريخ إنشاء
                    جامعة دمنهور لما يزيد عن قرن منذ أواخر السبعينيات كفرع لجامعة الإسكندرية.
                </p>
            </div>
            <div class="statistics">
                <div class="stat">
                    <i class="fas fa-user-graduate"></i>
                    
                    <p class="label fw-bold ">عدد طلاب الجامعة</p>
                    <p class="fw-bold" style="padding-top: 20px">12520</p>
                </div>
                <div class="stat">
                    <i class="fas fa-chalkboard-teacher"></i>
                    
                    <p class="label fw-bold">عدد أعضاء هيئة التدريس</p>
                    <p class="fw-bold">530</p>
                </div>
               
                <div class="stat">
                    <i class="fas fa-book"></i>
                    
                    <p class="label fw-bold">طلاب الدراسات العليا</p>
                    <p class="fw-bold">180</p>
                </div>
            </div>
        </div>
        <script src="home.js"></script>
    </body>

    </html>
@endsection
