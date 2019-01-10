<form action="{{route('admincategory.store')}}" method="post">
	@csrf
	<input type="text" name="categoryname">
	<select name="parentcategory">
		<option value="0">None</option>
		@foreach($categories as $category)
		<option value="{{$category->id}}">{{$category->category_name}}</option>
		@endforeach
	</select>
	<input type="submit" name="btnaddcategory" id="btnaddcategory">
</form>