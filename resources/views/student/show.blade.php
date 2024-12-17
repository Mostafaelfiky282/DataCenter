@extends('front.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <body>
        <div class="report-container">
            <h1>عرض التقرير</h1>
            @if ($students->isEmpty())
                <p>لا يوجد طلاب وفقًا للمعايير المحددة.</p>
            @else
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>الكليه</th>
                            <th>القسم</th>
                            <th>الفرقة</th>
                            <th>الجنسية</th>
                            <th>اللغة</th>
                            <th>المستجدين الذكور</th>
                            <th>المستجدين الاناث</th>
                            <th>الباقين الذكور</th>
                            <th>الباقين الاناث</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->college }}</td>
                                <td>{{ $student->department }}</td>
                                <td>{{ $student->level }}</td>
                                <td>{{ $student->nationality }}</td>
                                <td>{{ $student->language }}</td>
                                <td>{{ $student->male_freshmen }}</td>
                                <td>{{ $student->female_freshmen }}</td>
                                <td>{{ $student->male_remain }}</td>
                                <td>{{ $student->female_remain }}</td>
                                <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">تعديل</a></td>
                                <td>
                                    <br>
                                    <form action="{{ url('students/' . $student->id) }}" method="POST">
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
                                <form method="POST" action="{{route('excel',$student->id ?? '')}}">
                                    @csrf
                                    <button type="submit" class="export-button">حفظ Excel</button>
                                </form>
                                <form method="POST" action="{{ route('chart', ['department' => $student->department, 'level' => $student->level]) }}">
                                    @csrf
                                    <button type="submit" class="export-button">عرض مخطط</button>
                                </form>
                            </div>
                            
            @endif
        </div>
    </body>
@endsection
