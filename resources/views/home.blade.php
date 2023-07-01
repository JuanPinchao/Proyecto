@extends('layouts.plantilla')

@section('content')
    <div class="card card-primary">
        <div class="card-body p-2">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div>
    </div>
@endsection

@section('js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>
@endsection
