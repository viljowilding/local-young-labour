<?php

require 'assets/Postcodes-IO-PHP.php';
$postcode = new Postcode();
$continue = True;

parse_str($_SERVER['QUERY_STRING']);

if (!isset($code)) {
    $text_header = "Local Young Labour";
    $text_search = "Find your local group";
    $file_path = "data/Welcome.php";
    $title = " | Local Young Labour";
    $continue = False;
}
if($continue == True) {
    $text_header = "Your YL group is...";
    $text_search = "Search again?";
    try {
        $lookup = $postcode->lookup($code);
    }
    catch (Exception $e) {
        print_r($e);
        die();
    }

    foreach($lookup as $x => $x_value) {
        if ($x == "admin_district") {
            $borough = $x_value;
        }
    }
    $title = $borough . " | Local Young Labour";
    $file_path = "data/yl/" . $borough . ".php";
    if(!is_file($file_path)){
        $file_path = "data/yl/None.php";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Local Young Labour</title>
    <meta name="description" content="Find your local Young Labour group and get involved in our democracy.">
    <link rel="canonical" href="">
    <meta property="og:locale" content="en_GB">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Local Young Labour">
    <meta property="og:description" content="Find your local Young Labour group and get involved in our democracy.">
    <meta property="og:site_name" content="Local Young Labour">
    <meta property="og:image" content="https://londonyounglabour.co.uk/wp-content/uploads/2017/08/LYL-Barnet.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <meta name="apple-mobile-web-app-title" content="Local Young Labour">
    <meta name="application-name" content="Local Young Labour">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <!-- Styles/Linked assets -->
    <link rel="stylesheet" href="https://51e907dda41fa8746f42-af6f3e566f76c863f4f14237bf5b9b4b.ssl.cf5.rackcdn.com/wec/client/forthemany/html/assets/build/style.min.css">
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        window.bQuery = jQuery.noConflict(true);
        document.title = '<?php echo $title;?>';
    </script>
    <script type="text/javascript" src="assets/main.js"></script>
    <meta property="og:url" content="https://viljo.me/local-young-labour/">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body class="bsd bsd-signup-page show-header">

    <div id="site-wrapper" class="full-width">

        <header id="site-header" class="center">
            <a href="http://labour.org.uk/" id="branding" class="loaded fixed has-played">
                <img src="https://51e907dda41fa8746f42-af6f3e566f76c863f4f14237bf5b9b4b.ssl.cf5.rackcdn.com/wec/client/forthemany/html/assets/build/img/logo.svg" class="logo"></a>
        </header>
        <div class="mainContainer clearfix plain has-image">

            <div class="topper has-image">
                <div class="bsd-column bsd-column-main hidden">

                    <!-- End Header Content, Start BSD -->
                    <div id="signupheader">
                        <style>
                        br {
                            display: unset;
                        }
                        ul {
                          list-style-type: none;
                          padding: 0;
                          margin: 0;
                          color: #fff;
                          margin-left: 0 !important;
                          padding-left: 0 !important;
                        }
                        ul > li, li > a {
                            color: #fff;
                        }
                        .fa-facebook-f {
                            color: #3B5998;
                        }
                        .fa-twitter {
                            color: #1DA1F2;
                        }
                        .fa-envelope, .fa-phone, .fa-globe {
                            color: #DB4437;
                        }
                        .heart {
                            color: #e25555;
                        }
                        </style>
                        <style media="screen" type="text/css">
                            .mainContainer.has-image {
                                background: url(https://londonyounglabour.co.uk/wp-content/uploads/2017/08/LYL-Barnet.jpg);
                                background-blend-mode: multiply;
                                background-color: rgba(0, 0, 0, 0.5);
                            }
                            
                            .instagram-color {
                                background-color: #8a3ab9
                            }
                            
                            .facebook-color {
                                background-color: #3a589e
                            }
                            
                            .twitter-color {
                                background-color: #C42792
                            }
                            
                            .petition-stats {
                                width: 100%;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                border-radius: 3px;
                                margin-bottom: 10px;
                                padding: 5px 10px;
                                display: none;
                            }
                            
                            @media screen and (min-width: 440px) {
                                .petition-stats {
                                    flex-direction: row;
                                }
                            }
                            
                            @media screen and (max-width: 800px){
                                .mainContainer.plain {
                                    /*background: url(https://londonyounglabour.co.uk/wp-content/uploads/2017/08/LYL-Barnet.jpg) repeat !important;*/
                                }
                            }
                            
                            .bsd-column.bsd-column-main #signupfooter {
                                width: 100% !important;
                            }
                        </style>
                        <?php include($file_path);?>
                        <br>
                        <form name="signup" class="bsd-signup-878" id="signup">
                            <table id="signuptable">
                            <h1><?php echo $text_search;?></h1>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <td valign="top">
                                                <div class="fieldset" id="bsd-field-zip">
                                                    <div class="label">
                                                        <label class="field">Postal Code<span class="required">*</span></label>
                                                    </div>
                                                    <div class="input">
                                                        <input size="8" id="postcode" name="code" type="text">
                                                    </div>
                                                </div>
                                            </td>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <td valign="top">
                                                <div class="fieldset" id="bsd-field-submit-btn">
                                                    <div class="input">
                                                        <input value="Search" type="submit">
                                                    </div>
                                                </div>
                                            </td>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div id="fb-root"></div>
                        <!-- End BSD Content, Start Footer -->

                    </div>
                </div>

                <footer id="site-footer" class="blue">
                    <div class="footer-content clearfix">
                        <div class="row">
                            <div id="paid-for">Made with <span class="heart">❤</span> by Viljo Wilding.<br />Built with assets from <a href="https://labour.org.uk">The Labour Party</a> and <a href="https://postcodes.io">Postcodes.io</a>. </div>
                        </div>
                    </div>
                </footer>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <!-- WEC .js -->
                <script src="https://51e907dda41fa8746f42-af6f3e566f76c863f4f14237bf5b9b4b.ssl.cf5.rackcdn.com/wec/client/forthemany/html/assets/js/plugins/scripts.js"></script>
                <script>
                    (function($) {
                        $(window).load(function() {

                            var win = $(window),
                                requiredSpans = $('span.required'),
                                emailRow = $('#email').closest('tr').closest('tr'),
                                zipRow = $('#zip').closest('tr').closest('tr'),
                                header = $('#signupheader'),
                                betweenHeaderAndForm = $('h1').nextUntil('#signup'),
                                form = $('#signup'),
                                breakpoint = 768;

                            function makeCorrespondingInputRequired() {
                                $(this).closest('.fieldset').find('input').attr('required', 'required');
                            }

                            function isSmallScreen() {
                                return win.width() <= breakpoint;
                            }

                            function append(orig, target) {
                                target.append(orig);
                            }

                            // function moveText(); {
                            //     return isSmallScreen() ? append(betweenHeaderAndForm, form) : append(betweenHeaderAndForm, header);
                            // }

                            requiredSpans.each(makeCorrespondingInputRequired);
                            zipRow.before(emailRow);

                            //moveText();
                            //win.resize(moveText);

                        });
                    })(jQuery || bQuery);
                </script>
            </div>
        </div>
    </div>
</body>

</html>
