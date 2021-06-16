@foreach($categories as $category)
<li>
<a href="{{route('category_detail', $category->slug)}}" title="{{$category->name}}">{{$category->name}}</a>
</li>
@endforeach