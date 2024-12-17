

@extends('front.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <body>
        <div class="report-container">
            <h1>عرض بيان اجمالي مكأفات التفوق للطلاب </h1>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if ($rewards->isEmpty())
                <p>لا يوجد طلاب وفقًا للمعايير المحددة.</p>
            @else
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>الكلية</th>
                            <th>الفرقة</th>
                            <th>نوع المكأفة </th>
                            <th>عدد الطلاب</th>
                            <th>عدد الطالبات</th>
                            <th>المبلغ لكل طالب</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rewards as $reward)
                            <tr>
                                <td>{{ $reward->college }}</td>
                                <td>{{ $reward->level }}</td>
                                <td>{{ $reward->type }}</td>
                                <td>{{ $reward->male_students_amount }}</td>
                                <td>{{ $reward->female_students_amount}}</td>
                                <td>{{ $reward->price }}</td>

                                 <td><a href="{{ route('rewords.edit', $reward->id) }}" class="btn btn-info">تعديل</a></td>
                                <td>
                                    <br>
                                    <form action="{{ route('rewords.destroy', $reward->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">حذف</button>
                                    </form>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="POST" action="{{ route('excel', $student->id ?? '') }}">
                    @csrf
                    <button type="submit" class="export-button">حفظ Excel</button>
                </form>
            @endif
        </div>
    </body>
@endsection
