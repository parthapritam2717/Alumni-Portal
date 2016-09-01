﻿<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.woff">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.10.2.js"></script>

<style>
body {
    background: none repeat scroll 0 0 white;
}
nav.sidebar-menu-collapsed {
    width: 44px;
}
nav.sidebar-menu-expanded {
    width: auto;
}
nav.sidebar {
    /*position: fixed;
    top: 0px;
    left: 0px;*/
    height: 100%;
    background: none repeat scroll 0 0 #0099ff;
    color: white;
    padding: 20px 10px;
}
nav.sidebar a#justify-icon {
    outline: 0;
    color: white;
    font-size: 24px;
    font-style: normal;
}
nav.sidebar a#logout-icon {
    outline: 0;
    color: white;
    font-size: 24px;
    font-style: normal;
    position: absolute;
    bottom: 10px;
    left: 10px;
}
nav.sidebar ul.level1 {
    margin: 0;
    padding: 0;
    margin-top: 60px;
}
nav.sidebar ul.level1 li {
    margin: 0;
    padding: 0;
    margin-top: 20px;
    list-style-type: none;
}
nav.sidebar ul.level1 li a.expandable {
    outline: 0;
    display: block;
    position: relative;
    width: 100%;
    height: 30px;
    color: white;
    text-decoration: none;
    text-align: left;
    padding: 4px 4px 4px 0px;
    font-size: 20px;
}
nav.sidebar ul.level1 li a.expandable:hover {
    color: #bbbbbb;
}
nav.sidebar ul.level1 li a.expandable span.expanded-element {
    display: none;
    font-size: 11px;
    position: relative;
    bottom: 5px;
}
nav.sidebar ul.level1 li.active {
    margin-left: -4px;
}
nav.sidebar ul.level1 li.active a.expandable {
    background: none repeat scroll 0 0 black;
    border-radius: 4px;
    color: white !important;
    width: 30px;
    padding: 4px;
}
nav.sidebar ul.level1 li.active a.expandable:hover {
    color: white !important;
}
nav.sidebar ul.level1 ul.level2 {
    margin: 20px 6px 20px 30px;
    padding: 0;
    display: none;
}
nav.sidebar ul.level1 ul.level2 li {
    margin: 0;
    padding: 0;
    margin-top: 10px;
    padding-bottom: 10px;
    list-style-type: none;
    border-bottom: solid white 1px;
}
nav.sidebar ul.level1 ul.level2 li:last-child {
    border-bottom: none;
}
nav.sidebar ul.level1 ul.level2 li a {
    text-decoration: none;
    outline: 0;
    color: white;
    text-decoration: none;
    font-size: 11px;
}
</style>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
    <nav class='sidebar sidebar-menu-collapsed'> <a href='#' id='justify-icon'>
        <span class='glyphicon glyphicon-align-justify'></span>
      </a>

        <ul class='level1'>
            <li class='active'> <a class='expandable' href='#' title='Dashboard'>
            <span class='glyphicon glyphicon-home collapsed-element'></span>
            <span class='expanded-element'>Dashboard</span>
          </a>

                <ul class='level2'>
                    <li> <a href='#' title='Traffic'>Traffic</a>

                    </li>
                    <li> <a href='#' title='Conversion rate'>Conversion rate</a>

                    </li>
                    <li> <a href='#' title='Purchases'>Purchases</a>

                    </li>
                </ul>
            </li>
            <!--<li> <a class='expandable' href='#' title='APIs'>
            <span class='glyphicon glyphicon-wrench collapsed-element'></span>
            <span class='expanded-element'>APIs</span>
          </a>

            </li>-->
            <li> <a class='expandable' href='#' title='Settings'>
            <span class='glyphicon glyphicon-cog collapsed-element'></span>
            <span class='expanded-element'>Settings</span>
          </a>

            </li>
            <li> <a class='expandable' href='#' title='Account'>
            <span class='glyphicon glyphicon-user collapsed-element'></span>
            <span class='expanded-element'>Account</span>
          </a>

            </li>
        </ul> <a href='#' id='logout-icon' title='Logout'>
        <span class='glyphicon glyphicon-off'></span>
      </a>

    </nav>
</div>
</div>
</div>
</body>
<script src=""></script>
<script>

	(function () {
    $(function () {
        var SideBAR;
        SideBAR = (function () {
            function SideBAR() {}

            SideBAR.prototype.expandMyMenu = function () {
                return $("nav.sidebar").removeClass("sidebar-menu-collapsed").addClass("sidebar-menu-expanded");
            };

            SideBAR.prototype.collapseMyMenu = function () {
                return $("nav.sidebar").removeClass("sidebar-menu-expanded").addClass("sidebar-menu-collapsed");
            };

            SideBAR.prototype.showMenuTexts = function () {
                return $("nav.sidebar ul a span.expanded-element").show();
            };

            SideBAR.prototype.hideMenuTexts = function () {
                return $("nav.sidebar ul a span.expanded-element").hide();
            };

            SideBAR.prototype.showActiveSubMenu = function () {
                $("li.active ul.level2").show();
                return $("li.active a.expandable").css({
                    width: "100%"
                });
            };

            SideBAR.prototype.hideActiveSubMenu = function () {
                return $("li.active ul.level2").hide();
            };

            SideBAR.prototype.adjustPaddingOnExpand = function () {
                $("ul.level1 li a.expandable").css({
                    padding: "1px 4px 4px 0px"
                });
                return $("ul.level1 li.active a.expandable").css({
                    padding: "1px 4px 4px 4px"
                });
            };

            SideBAR.prototype.resetOriginalPaddingOnCollapse = function () {
                $("ul.nbs-level1 li a.expandable").css({
                    padding: "4px 4px 4px 0px"
                });
                return $("ul.level1 li.active a.expandable").css({
                    padding: "4px"
                });
            };

            SideBAR.prototype.ignite = function () {
                return (function (instance) {
                    return $("#justify-icon").click(function (e) {
                        if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-collapsed")) {
                            instance.adjustPaddingOnExpand();
                            instance.expandMyMenu();
                            instance.showMenuTexts();
                            instance.showActiveSubMenu();
                            $(this).css({
                                color: "#000"
                            });
                        } else if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-expanded")) {
                            instance.resetOriginalPaddingOnCollapse();
                            instance.collapseMyMenu();
                            instance.hideMenuTexts();
                            instance.hideActiveSubMenu();
                            $(this).css({
                                color: "#FFF"
                            });
                        }
                        return false;
                    });
                })(this);
            };

            return SideBAR;

        })();
        return (new SideBAR).ignite();
    });

}).call(this);

</script>