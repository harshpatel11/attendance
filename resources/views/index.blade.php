@section('style')
{{ HTML::style('assets/css/fullcalendar.css') }}
@endsection

@extends('layouts.app')
@section('content')
<div id='calendar'></div>
@endsection

@section('script')
{{ HTML::script('assets/js/moment.min.js') }}
{{ HTML::script('assets/js/fullcalendar.min.js') }}

<script>
$(document).ready(function() {

	$('#calendar').fullCalendar({

		dayRender: function (date, cell) {
	    	cell.css("background-color", "white");
		},

		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},

		defaultView: 'month',
		firstDay: 1,   //To Start week from Monday
		defaultDate: '2016-02-23',
		businessHours: true,

		events: [
			{
	            title: 'Leave',
				start: '2016-02-11',
				color: 'red'
	        },
			{
				title: 'Leave',
				start: '2016-02-18',
				end: '2016-02-20',
				color: 'red',
				content:'xgjg'

		}],
	});
});
</script>
@endsection