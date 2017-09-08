<?php 
    /* Dashboard Builder.
   Copyright (C) 2016 DISIT Lab http://www.disit.org - University of Florence

   This program is free software; you can redistribute it and/or
   modify it under the terms of the GNU General Public License
   as published by the Free Software Foundation; either version 2
   of the License, or (at your option) any later version.
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.
   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA. */
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Management System</title>

    <!-- Bootstrap Core CSS -->
    <!--<link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <!-- Modernizr -->
    <script src="../js/modernizr-custom.js"></script>

    <!-- Custom CSS -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles_gridster.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.gridster.css">
    <!--<link rel="stylesheet" type="text/css" href="../css/new/jquery.gridster.css">-->
    <link rel="stylesheet" href="../css/style_widgets.css" type="text/css" />
    
    <!-- Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
    <script src="../js/jquery-1.10.1.min.js"></script>
    
    <!-- JQUERY UI -->
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>-->
    <script src="../js/jqueryUi/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Gridster -->
    <script src="../js/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="../js/new/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>-->

    <!-- Highcharts -->
    <!--<script src="http://code.highcharts.com/highcharts.js"></script>-->
    <!--<script src="http://code.highcharts.com/modules/exporting.js"></script>-->
    <!--<script src="https://code.highcharts.com/highcharts-more.js"></script>-->
    <!--<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>-->
    <!--<script src="https://code.highcharts.com/highcharts-3d.js"></script>-->  
    <script src="../js/highcharts/code/highcharts.js"></script>
    <script src="../js/highcharts/code/modules/exporting.js"></script>
    <script src="../js/highcharts/code/highcharts-more.js"></script>
    <script src="../js/highcharts/code/modules/solid-gauge.js"></script>
    <script src="../js/highcharts/code/highcharts-3d.js"></script>
    
    <!-- TinyColors -->
    <script src="../js/tinyColor.js" type="text/javascript" charset="utf-8"></script>
    
    <!-- Font awesome icons -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../js/fontAwesome/css/font-awesome.min.css">
    
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
   integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
   integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
   crossorigin=""></script>
   
   <!-- Dot dot dot -->
   <script src="../dotdotdot/jquery.dotdotdot.js" type="text/javascript"></script>
    
    <script src="../js/widgetsCommonFunctions.js" type="text/javascript" charset="utf-8"></script>
    <script src="../widgets/trafficEventsTypes.js" type="text/javascript" charset="utf-8"></script>
    <script src="../widgets/alarmTypes.js" type="text/javascript" charset="utf-8"></script>

    <script type='text/javascript'>
        var array_metrics = new Array();
        var headerFontSize, headerModFontSize, subtitleFontSize, subtitleModFontSize, dashboardName, logoFilename, logoLink, 
            clockFontSizeMod, logoWidth, logoHeight, headerVisible = null;
        
        $(document).ready(function () 
        {
            var widgetsBorders, widgetsBordersColor = null;
            var firstLoad = true;
            var loggedUserFirstAttempt = true;
            var headerVisible = 1;
            
            $("#showHideHeader").off("click");
            $("#showHideHeader").click(function()
            {
               if(headerVisible === 1)
               {
                  $("#navbarDashboard").hide();
                  $("#navbarDashboard").css("margin-bottom", "0px");
                  $("#headerSpacer").hide();
                  $("#showHideHeader i").attr("class", "fa fa-expand");
                  $("#showHideHeader").attr("title", "Show dashboard header");
                  headerVisible = 0;
               }
               else
               {
                  $("#navbarDashboard").show();
                  $("#navbarDashboard").css("margin-bottom", "100px");
                  $("#headerSpacer").show();
                  $("#showHideHeader i").attr("class", "fa fa-compress");
                  $("#showHideHeader").attr("title", "Hide dashboard header");
                  headerVisible = 1;
               }
               
               $.ajax({
                  url: "../management/process-form.php",
                  data: {
                     showHideDashboardHeader: headerVisible, 
                     dashboardId: "<?= base64_decode($_GET['iddasboard']) ?>"
                  },
                  type: "POST",
                  async: true,
                  //dataType: 'json',
                  success: function (data)
                  {
                     //Non facciamo niente di specifico
                  },
                  error: function (data)
                  {
                     console.log("Ko");
                     console.log(data);
                  }
               });
            });
            
            //Definizioni di funzione
            function loadDashboard(dashboardParams, dashboardWidgets)
            {
                var num_cols;
                
                for (var i = 0; i < dashboardParams.length; i++)
                {
                    dashboardName = dashboardParams[i].name_dashboard;
                    logoFilename = dashboardParams[i].logoFilename;
                    logoLink = dashboardParams[i].logoLink;
                    headerVisible = dashboardParams[i].headerVisible;
                    widgetsBorders = dashboardParams[i].widgetsBorders;
                    widgetsBordersColor = dashboardParams[i].widgetsBordersColor;
                    $("#headerLogoImg").css("display", "none");
                    var wrapperWidth = parseInt(dashboardParams[i].width) + 40;
                    $("#wrapper-dashboard").css("width", wrapperWidth);
                    $("#container-widgets").css("width", dashboardParams[i].width);
                    $("#wrapper-dashboard").css("margin", "0 auto");
                    $("#navbarDashboard").css("background-color", dashboardParams[i].color_header);
                    //Sfondo
                    $("body").css("background-color", dashboardParams[i].external_frame_color);
                    $("#page-wrapper").css("background-color", dashboardParams[i].external_frame_color);
                    $("#container-widgets").css("background-color", dashboardParams[i].color_background);
                    $("#container-widgets").css("border-top-color",dashboardParams[i].color_background);

                    headerFontSize = dashboardParams[i].headerFontSize;
                    subtitleFontSize = parseInt(dashboardParams[i].headerFontSize * 0.22);
                    if(subtitleFontSize < 20)
                    {
                        subtitleFontSize = 20;
                    }
                    var headerFontColor = dashboardParams[i].headerFontColor;

                    var a = $('#dashboardTitle').prop("offsetWidth");
                    var b = $("#clock").prop("offsetWidth");

                    if(a > 912)
                    {
                        headerModFontSize = headerFontSize;
                        subtitleModFontSize = subtitleFontSize;
                    }
                    else
                    {
                        if(a > 768)
                        {
                            headerModFontSize = parseInt((headerFontSize*0.9));
                            subtitleModFontSize = parseInt((subtitleFontSize*0.9));    
                        }
                        else
                        {

                            if(a > 320)
                            {
                                headerModFontSize = parseInt((headerFontSize*0.75));
                                subtitleModFontSize = parseInt((subtitleFontSize*0.75));
                            }
                            else
                            {
                                headerModFontSize = parseInt((headerFontSize*0.55));
                                subtitleModFontSize = parseInt((subtitleFontSize*0.55));
                            }
                        }
                    }

                    if(b > 288)
                    {
                        clockFontSizeMod = 18;
                    }
                    else
                    {
                        if(b > 217)
                        {
                            clockFontSizeMod = parseInt((18*0.8));
                        }
                        else
                        {
                            if(b >= 188)
                            {
                                clockFontSizeMod = parseInt((18*0.7));
                            }
                            else
                            {
                                if(b >= 136)
                                {
                                    clockFontSizeMod = parseInt((18*0.55));
                                }
                                else
                                {
                                    clockFontSizeMod = parseInt((18*0.43));
                                }
                            }

                        }
                    }

                    $("#dashboardTitle").css("font-size", headerModFontSize + "pt");
                    $("#dashboardTitle").css("color", headerFontColor);
                    $("#dashboardTitle").text(dashboardParams[i].title_header);
                    $("#clock").css("color", headerFontColor);
                    $("#clock").css("font-size", clockFontSizeMod + "pt");

                    var whiteSpaceRegex = '^[ t]+';
                    if((dashboardParams[i].subtitle_header === "") || (dashboardParams[i].subtitle_header === null) ||(typeof dashboardParams[i].subtitle_header === 'undefined') ||(dashboardParams[i].subtitle_header.match(whiteSpaceRegex)))
                    {
                        $("#dashboardTitle").css("height", "100%");
                        $("#dashboardSubtitle").css("display", "none");
                    }
                    else
                    {
                        $("#dashboardTitle").css("height", "70%");
                        $("#dashboardSubtitle").css("height", "30%");
                        $("#dashboardSubtitle").css("font-size", subtitleModFontSize + "pt");
                        $("#dashboardSubtitle").css("display", "");
                        $("#dashboardSubtitle").css("color", headerFontColor);
                        $("#dashboardSubtitle").text(dashboardParams[i].subtitle_header);
                    }

                    if(logoFilename !== null)
                    {
                        $("#headerLogoImg").prop("src", "../img/dashLogos/" + dashboardName + "/" + logoFilename);
                        $("#headerLogoImg").prop("alt", "Dashboard logo");
                        var img = new Image();
                        img.src = "../img/dashLogos/" + dashboardName + "/" + logoFilename;
                        img.onload = function()
                        {
                            if((logoLink !== null) && (logoLink !== ''))
                            {
                               var logoImage = $('#headerLogoImg');
                               var logoLinkElement = $('<a href="' + logoLink + '" target="_blank" class="pippo">'); 
                               logoImage.wrap(logoLinkElement); 
                            }
                            logoWidth = $('#headerLogoImg').width();
                            logoHeight = $('#headerLogoImg').height();                                
                            $("#headerLogoImg").css("display", "");
                        };
                    }

                    num_cols = dashboardParams[i].num_columns;
                    num_rows = dashboardParams[i].num_rows;
                }//Fine del primo for
                
               if(headerVisible === '1')
               {
                  $("#navbarDashboard").show();
                  $("#navbarDashboard").css("margin-bottom", "100px");
                  $("#headerSpacer").show();
                  $("#showHideHeader i").attr("class", "fa fa-compress");
                  $("#showHideHeader").attr("title", "Hide dashboard header");
               }
               else
               {
                  $("#navbarDashboard").hide();
                  $("#navbarDashboard").css("margin-bottom", "0px");
                  $("#headerSpacer").hide();
                  $("#showHideHeader i").attr("class", "fa fa-expand");
                  $("#showHideHeader").attr("title", "Show dashboard header");
               }

                jQuery(function (){ 
                    jQuery(".gridster ul").gridster({
                        widget_base_dimensions: [76, 38],
                        widget_margins: [1, 1],
                        min_cols: num_cols,
                        max_size_x: 30,
                        max_rows: 50,
                        extra_rows: 50,
                        draggable: {ignore_dragging: true},
                        serialize_params: function ($w, wgd){
                            return {
                                id: $w.attr('id'),
                                col: wgd.col,
                                row: wgd.row,
                                size_x: wgd.size_x,
                                size_y: wgd.size_y
                            };
                        }
                    }).data('gridster').disable();
                });//Fine creazione Gridster

                var gridster = $("#container-widgets ul").gridster().data('gridster');

                for (var i = 0; i < dashboardWidgets.length; i++)
                {
                    var name_w = dashboardWidgets[i]['name_widget'];
                    var widgetId = dashboardWidgets[i]['Id_w'];
                    var time = 0;
                    if (dashboardWidgets[i]['temporal_range_widget'] !== "" && dashboardWidgets[i]['temporal_range_widget'] === "Mensile") 
                    {
                        time = "30/DAY";
                    } 
                    else if (dashboardWidgets[i]['temporal_range_widget'] !== "" && dashboardWidgets[i]['temporal_range_widget'] === "Annuale") 
                    {
                        time = "365/DAY";
                    } 
                    else if (dashboardWidgets[i]['temporal_range_widget'] !=="" && dashboardWidgets[i]['temporal_range_widget'] === "Settimanale") 
                    {
                        time = "7/DAY";
                    } 
                    else if (dashboardWidgets[i]['temporal_range_widget'] !== "" && dashboardWidgets[i]['temporal_range_widget'] === "Giornaliera") 
                    {
                        time = "1/DAY";
                    } 
                    else if (dashboardWidgets[i]['temporal_range_widget'] !== "" && dashboardWidgets[i]['temporal_range_widget'] === "4 Ore") 
                    {
                        time = "4/HOUR";
                    } 
                    else if (dashboardWidgets[i]['temporal_range_widget'] !== "" && dashboardWidgets[i]['temporal_range_widget'] === "12 Ore") 
                    {
                        time = "12/HOUR";
                    }
                    var widget = ['<li id="' + name_w + '"></li>', dashboardWidgets[i]['size_columns_widget'], dashboardWidgets[i]['size_rows_widget'], dashboardWidgets[i]['n_column_widget'], dashboardWidgets[i]['n_row_widget']];

                    gridster.add_widget.apply(gridster, widget);

                    var type_metric = new Array();
                    var source_metric = new Array();
                    for (var k = 0; k < dashboardWidgets[i]['metrics_prop'].length; k++) {
                        type_metric.push(dashboardWidgets[i]['metrics_prop'][k]['type_metric']);
                        source_metric.push(dashboardWidgets[i]['metrics_prop'][k]['source_metric']);
                    }

                    $("#container-widgets ul").find("li#" + name_w).load("../widgets/" + encodeURIComponent(dashboardWidgets[i]['type_widget']) + ".php?name=" + encodeURIComponent(name_w) + "&hostFile=index" + "&idWidget=" + encodeURIComponent(widgetId) + "&metric=" + encodeURIComponent(dashboardWidgets[i]['id_metric_widget']) +
                            "&freq=" + encodeURIComponent(dashboardWidgets[i]['frequency_widget']) + "&title=" + encodeURIComponent(dashboardWidgets[i]['title_widget']) + "&color=" + encodeURIComponent(dashboardWidgets[i]['color_widget']) + "&source=" + "&info=" + encodeURIComponent(dashboardWidgets[i]['message_widget']) + encodeURIComponent(source_metric) +
                            "&type_metric=" + encodeURIComponent(type_metric) + "&tmprange=" + encodeURIComponent(time) + "&city=" + encodeURIComponent(dashboardWidgets[i]['municipality_widget']) + "&link_w=" + encodeURIComponent(dashboardWidgets[i]['link_w']) + "&frame_color="+encodeURIComponent(dashboardWidgets[i]['frame_color']) + 
                            "&udm=" + encodeURIComponent(dashboardWidgets[i]['udm']) + "&fontSize=" + encodeURIComponent(dashboardWidgets[i]['fontSize']) + "&fontColor=" + encodeURIComponent(dashboardWidgets[i]['fontColor']) +
                            "&headerFontColor=" + encodeURIComponent(dashboardWidgets[i]['headerFontColor']) + "&numCols=" + encodeURIComponent(num_cols) + "&sizeX=" + encodeURIComponent(dashboardWidgets[i]['size_columns_widget']) + "&sizeY=" + encodeURIComponent(dashboardWidgets[i]['size_rows_widget']) + "&controlsPosition=" + encodeURIComponent(dashboardWidgets[i]['controlsPosition']) + "&zoomControlsColor=" + encodeURIComponent(dashboardWidgets[i]['zoomControlsColor']) + "&showTitle=" + encodeURIComponent(dashboardWidgets[i]['showTitle']) + "&controlsVisibility=" + encodeURIComponent(dashboardWidgets[i]['controlsVisibility']) + "&zoomFactor=" + encodeURIComponent(dashboardWidgets[i]['zoomFactor']) + "&defaultTab=" + encodeURIComponent(dashboardWidgets[i]['defaultTab']) + "&scaleX=" + encodeURIComponent(dashboardWidgets[i]['scaleX']) + "&scaleY=" + encodeURIComponent(dashboardWidgets[i]['scaleY']));

                }//Fine del secondo for

                //Applicazione bordi dei widgets
                if(widgetsBorders === 'yes')
                {
                    $(".gridster .gs_w").css("border", "1px solid " + widgetsBordersColor);
                }
                else
                {
                    $(".gridster .gs_w").css("border", "none");
                }

                $(window).resize(function() 
                {
                    var a = $('#dashboardTitle').prop("offsetWidth");
                    var b = $("#clock").prop("offsetWidth");
                    if(a > 912)
                    {
                        headerModFontSize = headerFontSize;
                        subtitleModFontSize = subtitleFontSize;
                    }
                    else
                    {
                        if(a > 768)
                        {
                            headerModFontSize = parseInt((headerFontSize*0.9));
                            subtitleModFontSize = parseInt((subtitleFontSize*0.9));    
                        }
                        else
                        {
                            if(a > 320)
                            {
                                headerModFontSize = parseInt((headerFontSize*0.75));
                                subtitleModFontSize = parseInt((subtitleFontSize*0.75));
                            }
                            else
                            {
                                headerModFontSize = parseInt((headerFontSize*0.55));
                                subtitleModFontSize = parseInt((subtitleFontSize*0.55));
                            }
                        }
                    }
                    if(b > 288)
                    {
                        clockFontSizeMod = 18;
                    }
                    else
                    {
                        if(b > 217)
                        {
                            clockFontSizeMod = parseInt((18*0.8));
                        }
                        else
                        {
                            if(b >= 188)
                            {
                                clockFontSizeMod = parseInt((18*0.7));
                            }
                            else
                            {
                                if(b >= 136)
                                {
                                    clockFontSizeMod = parseInt((18*0.55));
                                }
                                else
                                {
                                    clockFontSizeMod = parseInt((18*0.43));
                                }
                            }

                        }
                    }

                    $("#dashboardTitle").css("font-size", headerModFontSize + "pt");
                    $("#dashboardSubtitle").css("font-size", subtitleModFontSize + "pt");
                    $("#clock").css("font-size", clockFontSizeMod + "pt");
                });

                //Icona info
                $(document).on('click', '.info_source', function () {
                    var name_widget_m = $(this).parents('li').attr('id');
                    $.ajax({
                        url: "../management/get_data.php",
                        data: {widget_info: name_widget_m, action: "get_info_widget"},
                        type: "GET",
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            $('#titolo_info').text(data['title_widget']);
                            $('#contenuto_infomazioni').html(data['info_mess']);
                            $('#dialog-information-widget').modal('show');
                            $('#dialog-information-widget').css({
                                'vertical-align': 'middle',
                                'position': 'absolute',
                                'top': '10%'
                            });
                        }
                    });
                });
            }
            
            function authUser()
            {
                $.ajax({
                    url: "../management/getDashboardData.php",
                    //Lasciare il vecchio refuso "iddasboard" per non cambiare i link
                    data: 
                    { 
                        dashboardId: <?= base64_decode($_GET['iddasboard']) ?>,
                        username: $("#username").val(),
                        password: $("#password").val(),
                        loggedUserFirstAttempt: loggedUserFirstAttempt
                    },
                    type: "GET",
                    async: true,//LASCIARLA ASINCRONA.
                    dataType: 'json',
                    success: function (response) 
                    {  
                        switch(response.visibility)
                        {
                            case 'public':
                                $("#authFormContainer").hide();
                                $("#wrapper-dashboard").show();
                                loadDashboard(response.dashboardParams, response.dashboardWidgets);
                                break;

                            case 'author': case 'restrict':
                                switch(response.detail)
                                {
                                    case "credentialsMissing":
                                        $("#wrapper-dashboard").hide();
                                        if(firstLoad === false)
                                        {
                                            $("#authFormMessage").html("Credentials missing");
                                        }
                                        else
                                        {
                                            $("#authFormMessage").html("");
                                            firstLoad = false;
                                        }
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);
                                        break;
                                        
                                    case "checkUserQueryKo":
                                        //Fallimento query controllo presenza utente
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("Failure during DB query to check user: please try again");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);
                                        break;
                                        
                                    case "checkLoggedUserQueryKo":
                                        //Fallimento query controllo presenza utente
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("Failure during DB query to check user logged to main application: please try again");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);
                                        break;
                                        
                                    case "checkLoggedViewUserQueryKo":
                                        //Fallimento query controllo presenza utente
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("Failure during DB query to check user logged to dashboard view: please try again");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);
                                        break;     
                                        
                                    case "userNotRegistered":
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("User not registered or wrong username / password");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);
                                        break;
                                        
                                    case "Ok": 
                                        $("#authFormContainer").hide();
                                        $("#wrapper-dashboard").show();
                                        loadDashboard(response.dashboardParams, response.dashboardWidgets);
                                        if(response.context === "View")
                                        {
                                            $("#viewLogoutBtn").show();
                                            $("#viewLogoutBtn").click(function(){
                                                event.preventDefault();
                                                $("#logoutViewModal").modal('show');
                                            });
                                            
                                            $("#confirmLogoutBtn").click(function(event){
                                                $.ajax({
                                                    url: "../management/sessionUpdate.php",
                                                    data: {
                                                      sessionAction: 'closeViewSession',
                                                      dashboardId: <?= base64_decode($_GET['iddasboard']) ?>
                                                    },
                                                    type: "POST",
                                                    async: false,
                                                    dataType: 'json',
                                                    success: function (data) 
                                                    {
                                                        //console.log(JSON.stringify(data));
                                                        switch(data.detail)
                                                        {
                                                            case "Ok":
                                                                $("#logoutViewModalMain").hide();
                                                                $("#logoutViewModalOk").show();
                                                                setTimeout(function(){
                                                                    $("#logoutViewModal").modal('hide');
                                                                    location.reload();
                                                                }, 2000);
                                                                break;
                                                                
                                                            case "Ko":
                                                                $("#logoutViewModalMain").hide();
                                                                $("#logoutViewModalKo").show();
                                                                setTimeout(function(){
                                                                    $("#logoutViewModal").modal('hide');
                                                                    $("#logoutViewModalKo").hide();
                                                                    $("#logoutViewModalMain").show();
                                                                }, 2000);
                                                                break;
                                                        }
                                                    },
                                                    error: function (data)
                                                    {
                                                        $("#logoutViewModalMain").hide();
                                                        $("#logoutViewModalQueryKo").show();
                                                        setTimeout(function(){
                                                            $("#logoutViewModal").modal('hide');
                                                            $("#logoutViewModalKo").hide();
                                                            $("#logoutViewModalMain").show();
                                                        }, 2000);
                                                        console.log("Error");
                                                        console.log(JSON.stringify(data));
                                                    }
                                                });
                                            });
                                        }
                                        break;
                                        
                                    case "Ko": 
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("User not allowed to see this dashboard");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);        
                                        break;
                                        
                                    case "loggedUserKo": 
                                        loggedUserFirstAttempt = false;
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("Logged user not allowed to see this dashboard");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);        
                                        break;
                                        
                                    case "loggedViewUserKo": 
                                        loggedUserFirstAttempt = false;
                                        $("#wrapper-dashboard").hide();
                                        $("#authFormMessage").html("User logged to dashboard view not allowed to see this dashboard");
                                        $("#authFormContainer").show();
                                        $("#authBtn").click(authUser);        
                                        break;    
                                }
                                break; 
                        }
                    },
                    error: function (data)
                    {
                        $("#wrapper-dashboard").hide();
                        $("#authFormContainer").hide();
                        $("#getVisibilityError").show();
                        console.log("Error: " + JSON.stringify(data));
                    }
                }); 
            }
            //Fine definizioni di funzione
            
            //Main
            authUser();
        });
    </script>
</head>

<body>
    <div id="getVisibilityError">
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Dashboard management system</a>
                </div>
            </nav>
        </div>   
        <br/><br/><br/><br/>
        <h1>Error!</h1>
        <p>Error while trying to get dashboard visibility: please try again</p>
    </div>
    
    <div id="authFormContainer" class="container">
        <div id="authFormPanel" class="panel panel-primary col-xs-4 col-xs-offset-4">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form id="authForm" class="form-signin" role="form" method="post" action="">
                    <h2 class="form-signin-heading">Dashboard management system</h2>
                    <label for="username" class="sr-only">Username</label>
                    <input type="username" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="checkbox">
                        <label id="authFormMessage"></label>
                    </div>
                    <p>
                        <button id="authBtn" name="login" class="btn btn-primary btn-lg btn-block" type="button">Sign in</button>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-xs-4"></div><!-- Celle vuote di utilità -->
    </div> 
    
    <div id="wrapper-dashboard">
        <!-- New header -->
        <nav id="navbarDashboard" class="navbar navbar-inverse navbar-fixed-top noBorder" role="navigation">
            <div id="navbarDashboardHeader">
                <div class="dashboardHeaderLeft">
                        <div id="dashboardTitle"></div>
                        <div id="dashboardSubtitle"></div>
                </div>
            </div>
            <div id="headerLogo">
                    <img id="headerLogoImg"/>
            </div>
            <div id="clock"><?php include('../widgets/time.php'); ?></div>    
        </nav>
        <span id="headerSpacer"><br/><br/><br/><br/><br/><br/></span>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div id="container-widgets" class="gridster">
                    <ul></ul>    
                </div>
                <div id="logos" class="footerLogos">
                    <a href="#" class="footerLogo" id="showHideHeader"><i class='fa fa-compress'></i></a>
                    <a title="Logout from this dashboard" href="#" class="footerLogo"><i id="viewLogoutBtn" class="fa fa-sign-out"></i></a>
                    <!--<a title="Twitter vigilance" href="http://www.disit.org/tv" target="_new" class="footerLogo"><i class='fa fa-eye'></i></a>-->
                    <a title="Disit" href="http://www.disit.org" target="_new" class="footerLogo"><img src="../img/disitLogo.png" /></a>
                </div>
            </div>
        </div>
        <!-- page-wrapper -->
        <!-- modale informazioni generali del widget -->
        <div class="modal fade" tabindex="-1" id="dialog-information-widget" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" id="info01"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="titolo_info">Descrizione:</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-information-widget" class="form-horizontal" name="form-information-widget" role="form" method="post" action="" data-toggle="validator">
                            <div id="contenuto_infomazioni"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modale informazioni campi widget -->
        <div class="modal fade" tabindex="-1" id="modalWidgetFieldsInfo" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" id="info01"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modalWidgetFieldsInfoTitle"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalWidgetFieldsInfoForm" class="form-horizontal" name="modalWidgetFieldsInfoForm" role="form" method="post" action="" data-toggle="validator">
                            <div id="modalWidgetFieldsInfoContent"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> 
        
        <!-- Modale di conferma logout dashboard -->
        <div class="modal fade" id="logoutViewModal" tabindex="-1" role="dialog" aria-labelledby="logoutViewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="logoutViewModalLabel">Close this dashboard</h5>
                </div>
                <div class="modal-body">
                   <div id="logoutViewModalMain" class="modalBodyInnerDiv">
                     <div class="row" style="width: 100%; float: left">
                       Do you want to confirm logout from this dashboard?       
                     </div>
                   </div>
                   <div id="logoutViewModalOk" class="modalBodyInnerDiv">
                       <div class="modalBodyInnerDiv">Logout correctly executed</div>
                       <div class="modalBodyInnerDiv"><i class="fa fa-check" style="font-size:42px"></i></div>
                   </div>
                   <div id="logoutViewModalKo" class="modalBodyInnerDiv">
                       <div class="modalBodyInnerDiv">Logout not possibile, please try again</div>
                       <div class="modalBodyInnerDiv"><i class="fa fa-frown-o" style="font-size:42px"></i></div>
                   </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="discardLogoutBtn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="confirmLogoutBtn" class="btn btn-primary">Logout</button>
                </div>
              </div>
            </div>
        </div>
        
        <!-- Modale impossibilità di apertura link in nuovo tab per widgetExternalContent -->
        <div class="modal fade" tabindex="-1" id="newTabLinkOpenImpossibile" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content">
                    <div class="modal-header centerWithFlex">
                        <h4 class="modal-title">External content</h4>
                    </div>
                    <div class="modal-body">
                        <div id="newTabLinkOpenImpossibileMsg"></div>
                        <div id="newTabLinkOpenImpossibileIcon">
                             <i class="fa fa-frown-o"></i>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modale di apertura link in popup per widgetExternalContent -->
        <div class="modal fade" tabindex="-1" id="modalLinkOpen" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content">
                    <div class="modal-header centerWithFlex">
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="modalLinkOpenBody">
                            <iframe id="modalLinkOpenBodyIframe"></iframe>
                            <div id="modalLinkOpenBodyMap"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="modalLinkOpenCloseBtn">Back to dashboard</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>

