<?xml version="1.0" encoding="UTF-8"?>
@if(! empty($locations))
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

@foreach($locations as $set)
    <url>
        <loc>{{ $set->loc }}</loc>
        <lastmod>@if( !empty( $set->lastmod ) ){{ $set->lastmod }}@else{{ $configs->lastmod }}@endif</lastmod>
        <changefreq>@if( !empty( $set->changefreq ) ){{ $set->changefreq }}@else{{ $configs->changefreq }}@endif</changefreq>
        <priority>@if( !empty( $set->priority ) ){{ $set->priority }}@else{{ $configs->priority }}@endif</priority>
    </url>
@endforeach

</urlset>
@endif

