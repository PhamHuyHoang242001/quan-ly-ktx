@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container">
          <div id="calendar"></div>
        </div>
    </div>
    @if(Auth::user()->hasRole('admin')) 
    <script>
       document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventClick: function(info) {
      var eventObj = info.event;
      $('#' + eventObj.id).modal('show');
      
    },
    initialDate: '2022-12-15',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    dayMaxEvents: true,
    editable: true,
    events: [
      @foreach(@$room_register as $item)
      {
        id: '{{ $item->id }}',
        title: '{{$item->name}}',
        start: '{{$item->created_at}}',
      },
      @endforeach
    ]
  });
  
  calendar.render();
});

</script>
@foreach(@$room_register as $item)
<div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sinh viên đăng kí {{$item->created_at}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>{{ __('Tên') }}</th>
                    <th>{{ __('MSSV') }}</th>
                    <th>{{ __('Phòng') }}</th>
                    <th>{{ __('Giá phòng') }}</th>
                    <th>{{ __('Trạng thái')}}</th>
                </thead>
                <tbody>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mssv}}</td>
                    <td>{{$item->area_name}} - {{$item->room_number}}</td>
                    <td>{{$item->cost}}</td>
                    <td>{{$item->status}}</td>
                </tbody>
            </table>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      eventClick: function(info) {
        var eventObj = info.event;
      },
      initialDate: '2022-12-15',
    });
    
    calendar.render();
  });

</script>
@endif
    <!-- Modal -->
@endsection

