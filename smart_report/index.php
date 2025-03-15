<?php
include_once("lib/phpgraphlib.php");
error_reporting(E_PARSE | E_WARNING | E_ERROR);
date_default_timezone_set("Asia/Colombo");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
        <link rel="shortcut icon" href="../img/favicon.ico" />
        <meta charset="utf-8" />
        <title>Noritake Printing Management System 


        </title>
        <link href="../script/graphlib_style_smart.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.marquee.js"></script>
        <script>
            $(function () {
                $('div.inner_area marquee').marquee('smooth_m').mouseover(function () {
                    $(this).trigger('stop');
                }).mouseout(function () {
                    $(this).trigger('start');
                }).mousemove(function (event) {
                    if ($(this).data('drag') == true) {
                        this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
                    }
                }).mousedown(function (event) {
                    $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
                }).mouseup(function () {
                    $(this).data('drag', false);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                $("#example div:first").css("display", "block");

                jQuery.fn.slider = function () {
                    if (!$(this).children("div:last-child").is(":visible")) {
                        $(this).children("div:visible")
                                .css("display", "none")
                                .next("div").css("display", "block");
                    }
                    else {
                        $(this).children("div:visible")
                                .css("display", "none")
                                .end().children("div:first")
                                .css("display", "block");
                    }
                } // timer function end


                jQuery.fn.page_refresher = function () {

                    window.location = "";
                }
                // timer for refreash the page 30000 90000   120000
                window.setInterval(function () {
                    $("#example").page_refresher();
                }, 24000



                        );


                // timer for run the slider 3000 5000 8000
                window.setInterval(function () {
                    $("#example").slider();
                }, 12000);

            });

            function stop_slider() {
                $(".slider_div").attr('id', '');
            }
            function start_slider() {
                $(".slider_div").attr('id', 'example');
            }

        </script>
    </head>
    <body bgcolor="#000000">
        <div id="header">
            <table>
                <tr>
                    <td valign="top" class="comapny_loge"><img src="../assets/admin/layout/img/logo.png"   width="80" height="40" border="0" class="comapny_loge_image" /></td>
                    <td class="header_title">Noritake Printing Management System </td>

                   
                </tr>
            </table>
        </div>
        <div  class="slider_div" id="example" >
            <?php
            include("graph_sider/nlpl_daily_qty.php");
            include("graph_sider/nlpl_wip.php");
            //include("graph_sider/frl_time.php");  
            ?>
        </div>
        <div  class="wrapper">
            <div  class="inner_area">
                <marquee class="smooth_m"   behavior="scroll" direction="left" onMouseOut="this.start()" onMouseOver="this.stop()" scrollamount="1" >
                    This is a Noritake Printing Management System © All rights vijitha WUSL
                </marquee>
            </div>
        </div>
    </body>
</html>
