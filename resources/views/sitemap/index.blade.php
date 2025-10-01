<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/sitemap/weight-classes.xml') }}</loc>
        <lastmod>{{ Carbon\Carbon::now()->toIso8601String() }}</lastmod>
    </sitemap>
</sitemapindex>
