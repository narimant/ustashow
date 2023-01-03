<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<?php if (null != $style) {
    echo '<'.'?'.'xml-stylesheet href="'.$style.'" type="text/xsl"?>'."\n";
} ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
<?php foreach ($items as $item) : ?>
	<url>
	<loc><?= $item['loc'] ?></loc>
<?php

if (! empty($item['translations'])) {
    foreach ($item['translations'] as $translation) {
        echo "\t\t".'<xhtml:link rel="alternate" hreflang="'.$translation['language'].'" href="'.$translation['url'].'" />'."\n";
    }
}

if (! empty($item['alternates'])) {
    foreach ($item['alternates'] as $alternate) {
        echo "\t\t".'<xhtml:link rel="alternate" media="'.$alternate['media'].'" href="'.$alternate['url'].'" />'."\n";
    }
}

if ($item['priority'] !== null) {
    echo "\t\t".'<priority>'.$item['priority'].'</priority>'."\n";
}

if ($item['lastmod'] !== null) {
    echo "\t\t".'<lastmod>'.date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])).'</lastmod>'."\n";
}

if ($item['freq'] !== null) {
    echo "\t\t".'<changefreq>'.$item['freq'].'</changefreq>'."\n";
}

if (! empty($item['images'])) {
    foreach ($item['images'] as $image) {
        echo "\t\t".'<image:image>'."\n";
        echo "\t\t\t".'<image:loc>'.$image['url'].'</image:loc>'."\n";
        if (isset($image['title'])) {
            echo "\t\t\t".'<image:title>'.$image['title'].'</image:title>'."\n";
        }
        if (isset($image['caption'])) {
            echo "\t\t\t".'<image:caption>'.$image['caption'].'</image:caption>'."\n";
        }
        if (isset($image['geo_location'])) {
            echo "\t\t\t".'<image:geo_location>'.$image['geo_location'].'</image:geo_location>'."\n";
        }
        if (isset($image['license'])) {
            echo "\t\t\t".'<image:license>'.$image['license'].'</image:license>'."\n";
        }
        echo "\t\t".'</image:image>'."\n";
    }
}

if (! empty($item['videos'])) {
    foreach ($item['videos'] as $video) {
        echo "\t\t".'<videos:videos>'."\n";
        if (isset($video['thumbnail_loc'])) {
            echo "\t\t\t".'<videos:thumbnail_loc>'.$video['thumbnail_loc'].'</videos:thumbnail_loc>'."\n";
        }
        if (isset($video['title'])) {
            echo "\t\t\t".'<videos:title><![CDATA['.$video['title'].']]></videos:title>'."\n";
        }
        if (isset($video['description'])) {
            echo "\t\t\t".'<videos:description><![CDATA['.$video['description'].']]></videos:description>'."\n";
        }
        if (isset($video['content_loc'])) {
            echo "\t\t\t".'<videos:content_loc>'.$video['content_loc'].'</videos:content_loc>'."\n";
        }
        if (isset($video['duration'])) {
            echo "\t\t\t".'<videos:duration>'.$video['duration'].'</videos:duration>'."\n";
        }
        if (isset($video['expiration_date'])) {
            echo "\t\t\t".'<videos:expiration_date>'.$video['expiration_date'].'</videos:expiration_date>'."\n";
        }
        if (isset($video['rating'])) {
            echo "\t\t\t".'<videos:rating>'.$video['rating'].'</videos:rating>'."\n";
        }
        if (isset($video['view_count'])) {
            echo "\t\t\t".'<videos:view_count>'.$video['view_count'].'</videos:view_count>'."\n";
        }
        if (isset($video['publication_date'])) {
            echo "\t\t\t".'<videos:publication_date>'.$video['publication_date'].'</videos:publication_date>'."\n";
        }
        if (isset($video['family_friendly'])) {
            echo "\t\t\t".'<videos:family_friendly>'.$video['family_friendly'].'</videos:family_friendly>'."\n";
        }
        if (isset($video['requires_subscription'])) {
            echo "\t\t\t".'<videos:requires_subscription>'.$video['requires_subscription'].'</videos:requires_subscription>'."\n";
        }
        if (isset($video['live'])) {
            echo "\t\t\t".'<videos:live>'.$video['live'].'</videos:live>'."\n";
        }
        if (isset($video['player_loc'])) {
            echo "\t\t\t".'<videos:player_loc allow_embed="'.$video['player_loc']['allow_embed'].'" autoplay="'.
        $video['player_loc']['autoplay'].'">'.$video['player_loc']['player_loc'].'</videos:player_loc>'."\n";
        }
        if (isset($video['restriction'])) {
            echo "\t\t\t".'<videos:restriction relationship="'.$video['restriction']['relationship'].'">'.$video['restriction']['restriction'].'</videos:restriction>'."\n";
        }
        if (isset($video['gallery_loc'])) {
            echo "\t\t\t".'<videos:gallery_loc title="'.$video['gallery_loc']['title'].'">'.$video['gallery_loc']['gallery_loc'].'</videos:gallery_loc>'."\n";
        }
        if (isset($video['price'])) {
            echo "\t\t\t".'<videos:price currency="'.$video['price']['currency'].'">'.$video['price']['price'].'</videos:price>'."\n";
        }
        if (isset($video['uploader'])) {
            echo "\t\t\t".'<videos:uploader info="'.$video['uploader']['info'].'">'.$video['uploader']['uploader'].'</videos:uploader>'."\n";
        }
        echo "\t\t".'</videos:videos>'."\n";
    }
}

?>
	</url>
<?php endforeach; ?>
</urlset>

