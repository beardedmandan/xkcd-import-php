<div id="xkcd">
	<?php
		$link = 'http://xkcd.com/'; //xkcd website - default hyperlink for image to use
		$img = '<img src="images/xkcd.png" />'; //default xkcd image to use if xkcd website not accessible
		$file = 'http://xkcd.com/rss.xml';
		$file_headers = @get_headers($file); //check the $file header if page is reachable

		if($file_headers[0] != 'HTTP/1.0 404 Not Found') {
			$xkcdFeed = simplexml_load_file($file);
			//load image and hyperlink details from RSS feed
			$link = $xkcdFeed->channel->item[0]->link;
			$img = $xkcdFeed->channel->item[0]->description;
		}

		echo '<a href="' . htmlentities($link) . '">';
		echo $img;
		echo '</a>';
	?>
</div>
