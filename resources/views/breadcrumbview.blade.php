@if (count($breadcrumbs))


        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
               <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}
					 <span class="lnr lnr-arrow-right"></span>
               </a>

            @else
                <a class="breadcrumb-item active">{{ $breadcrumb->title }}</a>
            @endif

        @endforeach

@endif