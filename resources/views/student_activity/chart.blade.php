@extends('front.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Chart</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/excel.css') }}">

    </head>

    <body>
        <h1 class="text-center">عرض بياني عن احصائية الانشطة الطلابية</h1>
        @if ($total_students === 0)
        <p  class="text-center">لا يوجد طلاب وفقًا للمعايير المحددة.</p>
        @else
        <canvas id="studentChart" width="400" height="150"></canvas>
        <script>
            const studentData = {
                labels: ['العدد الكلي', 'الطلاب الذكور ', 'الطلاب الاناث '],
                datasets: [{
                    label: 'عدد الطلاب',
                    data: [{{ $total_students}}, {{ $male_students }}, {{ $female_students}}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(255, 99, 132, 0.2)', 
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 206, 86, 0.2)' 
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar', 
                data: studentData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'عدد الطلاب'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: ''
                            }
                        }
                    }
                }
            };


            const ctx = document.getElementById('studentChart').getContext('2d');
            const studentChart = new Chart(ctx, config);
        </script>
        @endif
    </body>

    </html>
@endsection