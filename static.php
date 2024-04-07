<?php
include('header.php');
$caturl = mysqli_real_escape_string($conn,$_GET['pageUrl']);
$caturl = input($caturl);
$caturl= strtolower($caturl);
$sqlnews10 = "SELECT `id` FROM `staticpage` WHERE `pageUrl` = '$caturl' OR `id` = '$caturl' LIMIT 1";
$resultnews10 = $conn->query($sqlnews10);
if ($resultnews10->num_rows > 0) {
    $catid = array();
    while($rownews10 = $resultnews10->fetch_assoc()) {
        $staticpageHeading = $rownews10["pageHeading"];
        $staticpageData = $rownews10["pageData"];
        $pageUrl = $rownews10["pageUrl"];
    }
}
?>
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            <?PHP echo $staticpageHeading; ?>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title"><?PHP echo $staticpageHeading; ?></h1>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <section class="section terms-conditions">
                                            <?PHP echo $staticpageData; ?>
                                        </section>
                                        <!-- .terms-conditions -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>


<?php
include('footer.php');
?>
