<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="row">
		<div class="col-md-6">
			<form class="form-group" action="{{ route('schedule-add') }}" method="POST">
				@csrf
				<input type="text" class="form-control" name="schedule_no" value="{{ $schedule_no }}">
				<input type="text" class="form-control" name="schedule_time">
				<input type="submit" class="btn btn-outline-success" name="Save">
			</form>
		</div>
		<div class="col-md-6">
			<table>
				<thead>
					<th>Serial</th>
					<th>Schedule</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($schedule as $data)
					<tr>
						<td>{{ $data->schedule_no }}</td>
						<td>{{ $data->schedule_time }}</td>
						@if($data->status ==1 )
						<td><a href=""> In-Active </a></td>
						@else
						<td><a href=""> Active </a></td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>