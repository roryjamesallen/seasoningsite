<?php
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

$sitemap .= '
<url>
  <loc>https://seasoning.live/</loc>
  <lastmod>2026-03-13T16:31:41+00:00</lastmod>
  <priority>1.00</priority>
</url>';

$date = date('Y-m-d');

$events_json = json_decode(file_get_contents('../events.json'), true);
foreach ($events_json as $event_id => $event_info){
    if (isset($event_info['permalink'])){
        $event_link = $event_info['permalink'];
    } else {
        $event_link = $event_id;
    }
    $sitemap .= '
<url>
  <loc>https://seasoning.live/event/'.$event_link.'</loc>
  <lastmod>'.$date.'</lastmod>
  <priority>0.75</priority>
</url>';
}

$artists_json = json_decode(file_get_contents('../artists.json'), true);
foreach ($artists_json as $artist_name => $artist_info){
    if (isset($artist_info['permalink'])){
        $artist_link = $artist_info['permalink'];
    } else {
        $artist_link = $artist_name;
    }
    $sitemap .= '
<url>
  <loc>https://seasoning.live/artist/'.$artist_link.'</loc>
  <lastmod>'.$date.'</lastmod>
  <priority>0.5</priority>
</url>';
}

$sitemap .= '<url>
  <loc>https://seasoning.live/artists</loc>
  <lastmod>'.$date.'</lastmod>
  <priority>0.25</priority>
</url>';

$sitemap .= '</urlset>';

file_put_contents('../sitemap.xml', $sitemap);
?>
