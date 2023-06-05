<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <script src="<?php echo e(asset('dist/index.global.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 'auto',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: <?php echo json_encode($events, 15, 512) ?>,
            });

            calendar.render();
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <center>
        <h3>البرنامج الشهري</h3>
        <a href="<?php echo e(route('request.create')); ?>"><button>العودة لصفحة الأعمال</button></a>
    </center>
    <div id='calendar'></div>

</body>

</html>
<?php /**PATH C:\laragon\www\example-app - Copy\resources\views/requests/calendar.blade.php ENDPATH**/ ?>