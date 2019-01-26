<?php
use App\Product;
Breadcrumbs::for('home', function ($trail) {
     $trail->push('Home', route('home'));
});

Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Shop', route('shop'));
    if (Request::segments()) {
    	foreach (array_slice(Request::segments(),1)  as  $value) {
    		$trail->push($value, route('shop',$value));
    	}
    }
});

Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});

Breadcrumbs::for('details', function ($trail) {
    $trail->parent('home');
    $request=array_slice(Request::segments(),1);
    $data=Product::where('slug', '=',$request)->firstOrFail();
    //dd($data->category->category_name);
     $trail->push($data->category->category_name, route('shop',$data->category->category_name));
      $trail->push($data->product_name, route('shop',$data->product_name));
});

?>