@extends('front.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <body>
        <div class="report-container">
            <h1>عرض التقرير</h1>
            @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
            @if ($expenses->isEmpty())
            <p>لا يوجد طلاب وفقًا للمعايير المحددة.</p>
             @else
            <table class="report-table">
                <thead>
                    <tr>
                        <th>الكلية</th>
                        <th>الجنسية</th>
                        <th>البرنامج</th>
                        <th>اعدادي</th>
                        <th>الفرقة الاولي</th>
                        <th>الفرقة الثانية</th>
                        <th>الفرقة الثالثة</th>
                        <th>الفرقة الرابعة</th>
                        <th>الفرقة الخامسة</th>
                        <th>الفرقة السادسة</th>
                        <th>تعديل</th>
                        <th>حذف</th>



                    </tr>
                </thead>
                <tbody>
                  @foreach ($expenses as $expense)
                    
               
                    <tr>
                        <td>{{$expense->college}}</td>
                        <td>{{$expense->nationality}}</td>
                        <td>{{$expense->program}}</td>
                        <td>{{$expense->level_zero}}</td>
                        <td>{{$expense->level_one}}</td>
                        <td>{{$expense->level_two}}</td>
                        <td>{{$expense->level_three}}</td>
                        <td>{{$expense->level_four}}</td>
                        <td>{{$expense->level_five}}</td>
                        <td>{{$expense->level_six}}</td>
                        
                        <td><a href="{{route('expenses.edit',$expense->id)}}" class="btn btn-info">تعديل</a></td>
                                <td>
                                    <br>
                                    <form action="{{route('expenses.destroy',$expense->id)}}"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">حذف</button>
                                    </form>
                                </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST">
                @csrf
                <button type="submit" class="export-button">حفظ Excel</button>
            </form>
            @endif
        </div>
    </body>
@endsection
