<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="row">
		<div class="col-md-6">
			<form class="form-group" action="{{ route('booking-add') }}" method="POST">
				@csrf
				<input type="text" class="form-control" name="book_no" value="{{ $book_no }}">
				<input type="text" class="form-control" name="customer_name">
				<select class="form-control" name="schedule_id">
					<option selected="selected" disabled="disabled"> -- Select Please -- </option>
					@foreach($schedule as $data)
						<option value="{{ $data->id }}" @foreach($booking as $datas) @if($datas->schedule_id == $data->id) disabled="disabled" @endif @endforeach> {{ $data->schedule_time }} </option>
					@endforeach
				</select>
				<input type="submit" class="btn btn-outline-success" name="Save">
			</form>
		</div>
		<div class="col-md-6">
			<table>
				<thead>
					<th>Serial</th>
					<th>Customer Name</th>
					<th>Schedule</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($book as $data)
					<tr>
						<td>{{ $data->book_no }}</td>
						<td>{{ $data->customer_name }}</td>
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