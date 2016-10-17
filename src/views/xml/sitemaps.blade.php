<?xml version="1.0" encoding="UTF-8"?>
@if(! empty($locations))
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($locations as $location)
    <sitemap>
        <loc>{{ $location->loc }}</loc>
        <lastmod>@if( !empty( $location->lastmod ) ){{ $location->lastmod }}@else{{ $configs->lastmod }}@endif</lastmod>
    </sitemap>
@endforeach
</sitemapindex>
@endif

