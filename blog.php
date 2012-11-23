<!DOCTYPE HTML>
<html>
    <head>
        <title>Rooftop Variables - Blog</title>

        <link rel="stylesheet" href="style.css" />

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/html5_wizardry.js"></script>
        <script type="text/javascript" src="js/static_stars.js"></script>

    </script>
    </head>

<body id="container">
    <canvas id="bgGradient"></canvas>

    <div id="header">
	    Rooftop Variables<!--<span class="subtitle">Blog</span>-->
	</div>

    <div id="content">
        <table id="menu">
            <tr>
                <td><a href="index.html">Home</a></td>
                <td><a href="people.html">People</a></td>
                <td id="thispage"><a href="blog.php">Blog</a></td>
                <td><a href="index.html">Images</a></td>
                <td><a href="index.html">Science</a></td>
                <td id="last"><a href="index.html">Links</a></td>
            </tr>
        </table>

        <hr align="center" width="80%" color="#ddd" height="0.25px" />

        <div id="text" class="blog">
            <?php
                require_once 'php/rss_fetch.inc';
                $url = "http://rvnyc.wordpress.com/feed/atom/";
                $rss = fetch_rss($url);
                $maxitems = 1;
                $items = array_slice($rss->items, 0, $maxitems);

                foreach ($rss->items as $item ) {
                	$title = $item[title];
                	$url = $item[link];
                	$content = $item['atom_content'];
                	$date = substr($item['updated'], 0, 10);
                	$author = $item['author_name'];
                	echo "<hr width='100%' height='1' color='#666' align='left'>";
                	echo "<div class='blogTitleWrapper'><a href=$url class='blogTitle'>$title</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;Posted on $date by $author</div>";
                	echo "<hr width='50%' height='0.5' color='#aaa' align='left'>";
                	echo "<div class='blogPost'>$content</div>";
                }
            ?>
        </div>

        <img src="images/skyline.png" id="skyline" />
    </div>

</body>

</html>