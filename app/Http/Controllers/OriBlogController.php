<?php
namespace App\Http\Controllers;
use App\Models\oriblog;
use Illuminate\Http\Request;
class OriBlogController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['oriblogs'] = oriblog::orderBy('id','desc')->paginate(5);
return view('oriblogs.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('oriblogs.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'title' => 'required',
'content' => 'required',
'category'=>'required',
'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
]);
$Oriblog = new oriblog;
$Oriblog->title = $request->title;
$Oriblog->content = $request->content;
$Oriblog->category = $request->category;
$Oriblog->picname = $request->file('image')->getClientOriginalName();
$Oriblog->path= $request->file('image')->store('public/images');
$Oriblog->save();
return redirect()->route('oriblogs.index')
->with('success','Blog has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\oriblog  $Oriblog
* @return \Illuminate\Http\Response
*/
public function show(oriblog $Oriblog)
{
return view('oriblogs.show',compact('Oriblog'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\oriblog  $Oriblog
* @return \Illuminate\Http\Response
*/
public function edit(oriblog $Oriblog)
{
return view('oriblogs.edit',compact('Oriblog'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\oriblog  $Oriblog
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'title' => 'required',
'content' => 'required',
'category'=>'required',
'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
]);
$Oriblog = oriblog::find($id);
$Oriblog->title = $request->title;
$Oriblog->content = $request->content;
$Oriblog->category = $request->category;
$Oriblog->picname = $request->file('image')->getClientOriginalName();
$Oriblog->path= $request->file('image')->store('public/images');

$Oriblog->save();
return redirect()->route('oriblogs.index')
->with('success','Blog Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\oriblog  $Oriblog
* @return \Illuminate\Http\Response
*/
public function destroy(oriblog $Oriblog)
{
    $Oriblog->delete();
return redirect()->route('oriblogs.index')
->with('success','Blog has been deleted successfully');
}
}