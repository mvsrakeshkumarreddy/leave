<!DOCTPE html>
<html>
<head>
<title>View Leave Records</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>First Name</td>
<td>Last Name</td>
<td>City Name</td>
<td>Email</td>
<td>Status</td>
<td>Remarks</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->crew_id }}</td>
<td>{{ $user->fromdate }}</td>
<td>{{ $user->todate }}</td>
<td>{{ $user->reason }}</td>
<td>{{ $user->status }}</td>
<td>{{ $user->remarks }}</td>
</tr>
@endforeach
</table>

<table border = "1">
<tr>
<td>Id</td>

</tr>
<tr>
<td>{{ Auth::user()->crew_id }}</td>
</tr>
</table>




</body>
</html>