@extends('front.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <body>
        <div class="report-container">
            <h1>عرض التقرير</h1>
            @if ($financials->isEmpty())
                <p>لا يوجد طلاب وفقًا للمعايير المحددة.</p>
            @else
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>الكليه</th>
                            <th>العام</th>
                            <th>نوع المساعدة</th>
                            <th>عدد الطلاب الذكور</th>
                            <th>عدد الطلاب الاناث</th>
                            <th>المبلغ لكل فرد</th>
                            <th>العدد الكلي</th>
                            <th>المبلغ الكلي</th>
                            @if(auth()->user()->role != 'User')
                            <th>تعديل</th>
                            <th>حذف</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($financials as $financial)
                            <tr>
                                <td>{{ $financial->college }}</td>
                                <td>{{ $financial->year }}</td>
                                <td>{{ $financial->type }}</td>
                                <td>{{ $financial->Male_students_amount }}</td>
                                <td>{{ $financial->female_students_amount }}</td>
                                <td>{{ $financial->price }}</td>
                                <td>{{ ($financial->Male_students_amount +  $financial->female_students_amount) }}</td>
                                <td>{{ (($financial->Male_students_amount + $financial->female_students_amount) * $financial->price) }}</td>
                                @if(auth()->user()->role != 'User')
                                <td><a href="{{route('financial.edit',$financial->id)}}" class="btn btn-info">تعديل</a></td>
                                <td>
                                    <br>
                                    <form action="{{route('financial.destroy',$financial->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                        
                            <div style="display: flex; padding-right:550px; gap:50px;">
                                <form method="POST" action="{{Route('financial.excel')}}">
                                    @csrf
                                    <button type="submit" class="export-button">حفظ Excel</button>
                                </form>
                                <form method="POST" action="{{Route('financial.chart')}}">
                                    @csrf
                                    <button type="submit" class="export-button">عرض مخطط</button>
                                </form>
                            </div>
                            
            @endif
        </div>
    </body>
@endsection
