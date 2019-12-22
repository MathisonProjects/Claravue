<div>
	You are being emailed to be informed of an update on a task.
</div>
<div>
	<b>ID #:</b> T#{{ $data['id'] }}<br />
	<b>Creation Date:</b> {{ $data['created_at'] }}<br />
	<b>Update Date:</b> {{ $data['updated_at'] }}<br />
	<b>Archival Date:</b> {{ $data['archived_at'] }}<br />
	<b>Task Name:</b> {{ $data['Name'] }}<br />
	<b>Status:</b> 
	@if ($data['Status'] == 0)
		Ready
	@elseif ($data['Status'] == 1)
		Active
	@elseif ($data['Status'] == 2)
		PR Pending
	@elseif ($data['Status'] == 3)
		QA
	@elseif ($data['Status'] == 4)
		Complete
	@elseif ($data['Status'] == 5)
		Roadblock
	@endif
	<br />
	<b>Task Description:</b> {!! $data['Description'] !!}<br />
</div>
