<?xml version="1.0" encoding="UTF-8"?>

@if(! empty($sitemaps))

    <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        @foreach($sitemaps as $map)
            <sitemap>
                <loc>{{ $map->loc }}</loc>
                <lastmod>@if( !empty( $map->lastmod ) ){{ $map->lastmod }}@else{{ $configs->lastmod }}@endif</lastmod>
            </sitemap>
        @endforeach

    </sitemapindex>

@endif
@if(! empty($urlset))

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

@foreach($urlset as $set)
    <url>
        <loc>{{ $set->loc }}</loc>
        <lastmod>@if( !empty( $set->lastmod ) ){{ $set->lastmod }}@else{{ $configs->lastmod }}@endif</lastmod>
        <changefreq>@if( !empty( $set->changefreq ) ){{ $set->changefreq }}@else{{ $configs->changefreq }}@endif</changefreq>
        <priority>@if( !empty( $set->priority ) ){{ $set->priority }}@else{{ $configs->priority }}@endif</priority>
    </url>
@endforeach

</urlset>
@endif

