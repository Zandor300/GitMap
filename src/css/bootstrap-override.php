<style>
.container {
  height:100%;
}



.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

.navbar-header > a:hover,
.navbar-header > a:focus {
  background-color: #1b9bff;
}
.navbar-default {
  background-color: #2e2e2e;
  border-color: #2fb0d4;
  border-bottom: 5px solid <?php echo getConfig('color'); ?>;
  box-shadow: 0px 0px 15px <?php echo getConfig('color'); ?>;
}
.navbar-footer {
  border-top: 5px solid <?php echo getConfig('color'); ?>;
  border-bottom: 0;
  margin-bottom: 0;
  bottom: 0;
}
html,body {
  height:100%;
}
#wrapper{
min-height: 100%;
position:relative;
/* Firefox */
min-height: -moz-calc(100% - 55px);
/* WebKit */
min-height: -webkit-calc(100% - 55px);
/* Standard */
min-height: calc(100% - 55px);
}

.push {
  height:60px;
}
#contentage {
    min-height: 100%;
    height: 100%;
    margin: 0 auto -155px; /* the bottom margin is the negative value of the footer's height */
}

.navbar-default .navbar-nav > li > a,
.navbar-default .navbar-nav > li > a {
    color: <?php echo getConfig('color'); ?>;
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
    color: #fff;
    background-color: <?php echo getConfig('color'); ?>;
}
.navbar-default .navbar-nav > .active > a, 
.navbar-default .navbar-nav > .active > a:hover, 
.navbar-default .navbar-nav > .active > a:focus {
    color: #fff;
    background-color: <?php echo getConfig('color'); ?>;
}
.navbar-brand, 
.navbar-brand:hover, 
.navbar-brand:focus {
    color: #fff;
    background-color: <?php echo getConfig('color'); ?>;
}


.navbar-static-bottom {
  position:absolute;
  bottom:0;
  width:100%;
  border-radius: 0;
}




a {
  color: <?php echo getConfig('color'); ?>;
}
a:hover {
  color: <?php echo getConfig('color'); ?>;
  text-shadow: 0 0 15px <?php echo getConfig('color'); ?>;
}
::selection {
  background: <?php echo getConfig('color'); ?>; /* WebKit/Blink Browsers */
}
::-moz-selection {
  background: <?php echo getConfig('color'); ?>; /* Gecko Browsers */
}




.dropdown-menu {
  background-color: <?php echo getConfig('color'); ?>;
  border: 1px solid <?php echo getConfig('color'); ?>;
}
.dropdown-menu > li > a,
.dropdown-menu > li > a {
    color: <?php echo getConfig('color'); ?>;
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
    height:75px;
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
    height:75px;
    color: #ffffff;
    background-color: <?php echo getConfig('color'); ?>;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
    color: #ffffff;
    background-color: <?php echo getConfig('color'); ?>;
}



.bg {
  position: fixed;
  width: 100%;
  height: 300px; /*same height as jumbotron */
  top:0;
  left:0;
  z-index: -1;
}

#banner { 
    height: 350px; 
    margin: 0 auto;
    width: 100%;
    position: relative;
    padding: 10px 0;
  margin-bottom:10px;
}

.jumbotron {
  margin-bottom:0;
}
.jumbotron-page {
  padding:10px;
}
.jumbotron > .container {
    height: auto;
}



#banner h1,
#banner .h1 {
  color: inherit;
  text-shadow: 0 0 15px <?php echo getConfig('color'); ?>;
  font-size: 75px;
}
#banner img,
#banner .img {
  box-shadow: 0 0 15px <?php echo getConfig('color'); ?>;
}



.btn {
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
}
.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.open > .dropdown-toggle.btn-info {
  color: #fff;
  background-color: <?php echo getConfig('color'); ?>;
  border-color: <?php echo getConfig('color'); ?>;
  box-shadow: 0 0 15px <?php echo getConfig('color'); ?>;
}
.btn-info {
  color: #fff;
  background-color: <?php echo getConfig('color'); ?>;
  border-color: <?php echo getConfig('color'); ?>;
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.open > .dropdown-toggle.btn-danger {
  color: #fff;
  background-color: #FF0000;
  border-color: #FF0000;
  box-shadow: 0 0 15px #FF0000;
}
.btn-danger {
  color: #fff;
  background-color: #FF0000;
  border-color: #FF0000;
}




.div-users:hover,
.div-users:focus,
.div-users:active,
.div-users.active {
  color: #fff;
  background-color: #FF6600;
  box-shadow: 0 0 15px #FF6600;
}
.div-users > a {
  color: #000;
}
.div-users > a:hover,
.div-users > a:focus,
.div-users > a:active,
.div-users.active > a {
  color: #fff;
  background-color: #FF6600;
  box-shadow: 0 0 15px #FF6600;
}
.div-users {
  color: #000;
  background-color: #fff;
  margin-bottom: 5px;
  margin-top: 5px;
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
}








a.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {
  color: #428bca;
  background-color: #fff;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
  color: #fff;
  background-color: #FF6600;
}





a {
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
}






.open > .dropdown-menu {
  -webkit-transform: scale(1, 1);
  transform: scale(1, 1);  
  
}
.open > .dropdown-menu li a {
  color: #000;  
}
.dropdown-menu li a{
  color: #fff;
}
/*.dropdown-menu {
  -webkit-transform-origin: top;
  transform-origin: top;
  -webkit-animation-fill-mode: forwards;  
  animation-fill-mode: forwards; 
  -webkit-transform: scale(1, 0);
  display: block;
  
  transition: all 0.2s ease-out;
  -webkit-transition: all 0.2s ease-out;
}
.dropup .dropdown-menu {
  -webkit-transform-origin: bottom;
  transform-origin: bottom;  
}*/
 
.navbar .nav > li > .dropdown-menu:after {
 
}
.navbar > .container {
    height:auto;
}
.dropup > .dropdown-menu:after {
  border-bottom: 0;
  border-top: 6px solid rgba(39, 45, 51, 0.9);
  top: auto;
  display: inline-block;
  bottom: -6px;
  content: '';
  position: absolute;
  left: 50%;
  border-right: 6px solid transparent;
  border-left: 6px solid transparent;
}
</style>