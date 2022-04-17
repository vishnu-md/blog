<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 style="color:orange";>OriBlog</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('oriblogs.create') }}"> Add blog</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table>
@foreach ($oriblogs as $Oriblog)
<tr>
    <td><img src="{{ asset($Oriblog->path) }}" style="width:100px; height:75px;" alt="Blog pic" ></td>
    </tr>
<tr>
<td style="text-align:center; font-weight:bold;">{{ $Oriblog->title }} </td>
</tr>
<tr>
<td>{{ $Oriblog->content }}<sub><i>( {{ $Oriblog->category }} )</i></sub></td>
</tr>
<td>
<form action="{{ route('oriblogs.destroy',$Oriblog->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('oriblogs.edit',$Oriblog->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $oriblogs->links() !!}
</body>
</html>