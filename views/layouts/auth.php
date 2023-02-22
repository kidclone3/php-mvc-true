<!doctype html>
<?php
/** @var $this \thecodeholic\phpmvc\View */
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/profile.css">

    <title><?php echo $this->title?></title>
</head>
<body>

<div id="master" class="wf">
        <div id="auth" data-autoscrool="1" data-autohide="1">
            <div class="box-wrap">
                <div class="auth-logo">
                    <a href="#">
                        <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="logo">
                    </a>
                </div>
                <div class="box">
                {{content}}
                </div>
            </div>
        </div>
</div>


<!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    var width = $(window).width();
    $(window).on('resize', function() {
        if ($(this).width() !== width) {
            width = $(this).width();
            // $("#auth").css("left", width-600)
            console.log(width);
        }
    });
</script>
</body>
</html>