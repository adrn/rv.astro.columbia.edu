<!DOCTYPE HTML>
<html>
    <head>
        <title>Rooftop Variables - Home</title>

        <link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/static_stars.js"></script>
        <link rel="stylesheet" href="css/style.css" />

    </script>
    </head>

<body>
    <canvas id="bgGradient"></canvas>

    <div id="content">
        <header id="header">
            <span id="rooftop-variables">Rooftop Variables</span>
            <nav id="header-nav">
                <ul id="nav" class="menu">
                    <li id="home" class="nav-item"><a href="index.html">Home</a></li>
                    <li id="info" class="nav-item"><a href="info.html">Info</a></li>
                    <li id="blog" class="nav-item"><a href="blog.php">Blog</a></li>
                    <li id="links" class="nav-item last"><a href="links.html">Links</a></li>
                </ul>
            </nav>
        </header>

        <div id="page">
            <div id="subheader">
                <div id="subheader-inner">
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
                        	echo "<div class='one-half'><a href=$url class='blogTitle'>$title</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;Posted on $date by $author</div>";
                        	echo "<div class='one-half'>$content</div>";
                        }
                    ?>
                </div>
            </div>

            <div>
                Rooftop Variables is a hands-on training program for middle- and high-school science teachers in the New York City area.
            </div>
        </div>

        <!--<img src="images/skyline.png" id="skyline" />-->
    </div>

</body>

</html>