<h1>My View</h1>
<h2>My View</h2>
	{{-- @foreach ($user as $value) 
		{{$value}}.<br>	
	@endforeach
 --}}
@if($number>0)
	<p>Số dương</p>
@elseif($number<0)
	<p>Số âm</p>
@else
	<p>Số 0</p>
@endif


