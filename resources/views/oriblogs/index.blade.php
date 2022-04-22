<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="{{asset('asset/css/index.css')}}">
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h1 style="color:orange; text-align:center;">OriBlog</h1>
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
    <td><img src="{{ asset($Oriblog->picname) }}" style="width:200px; height:150px;" alt="" ></td>
    </tr>
<tr>
<td style=" font-weight:bold;color:rgb(141, 179, 7);"><h2>{{ $Oriblog->title }}</h2> </td>
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