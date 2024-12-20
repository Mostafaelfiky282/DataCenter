@extends('front.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <body>
        <div class="report-container">
            <h1>الانشطة الدولية بالجامعات</h1>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if ($student_activity->isEmpty())
                <p>لا يوجد طلاب وفقًا للمعايير المحددة.</p>
            @else
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>الكلية</th>
                            <th>نوع الانشطه</th>
                            <th>عدد الطلاب الذكور</th>
                            <th>عدد الطالبات الاناث</th>
                            <th>التكلفه بالجنيه </th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_activity as $student_ac)
                            <tr>
                                <td>{{ $student_ac->college }}</td>
                                <td>{{ $student_ac->type }}</td>
                                <td>{{ $student_ac->male_student_amount }}</td>
                                <td>{{ $student_ac->female_student_amount }}</td>
                                <td>{{ $student_ac->price }}</td>

                                <td><a href="{{ route('student_activity.edit', $student_ac->id) }}" class="btn btn-info">تعديل</a></td>
                                <td>
                                    <br>
                                    <form action="{{ route('student_activity.destroy', $student_ac->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">حذف</button>
                                    </form>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
                <div style="display: flex; padding-right:550px; gap:50px;">
                    <form method="POST" action="{{route('student_activity.excel')}}">
                        @csrf
                        <button type="submit" class="export-button">حفظ Excel</button>
                    </form>
                    <form method="POST" action="{{ route('pianiStu')}}">
                        @csrf
                        <button type="submit" class="export-button">عرض مخطط</button>
                    </form>
                </div>
            @endif
        </div>
    </body>
@endsection

