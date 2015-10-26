<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
 <url>
	<loc><?php echo Router::url('/',true); ?></loc>
	<changefreq>daily</changefreq>
	<priority>1.0</priority>
</url> 
<?php foreach ($docs as $doc):

 	$date = date('Y-m-d', strtotime($doc['Doc']['updated'])); 
 ?>
<url>
	<loc><?php echo Router::url('/' . $doc['Doc']['code'],true); ?></loc>
	<lastmod><?php echo $date; ?></lastmod>
	<changefreq>daily</changefreq>
	<priority>1.0</priority>
</url>
 <?php endforeach; ?>
<?php foreach ($videos as $video):

 	$date = date('Y-m-d', strtotime($video['Video']['created'])); 
 ?>
<url>
	<loc><?php echo Router::url('/videos/view/' . $video['Video']['id'],true); ?></loc>
	<lastmod><?php echo $date; ?></lastmod>
	<changefreq>daily</changefreq>
	<priority>1.0</priority>
</url>
 
<?php endforeach; ?>
</urlset>