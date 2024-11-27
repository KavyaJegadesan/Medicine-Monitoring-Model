<?php
	header("Content-type: text/css; charset: UTF-8");
	
	if(isset($_GET['theme']))
	{
		if($_GET['theme'] == 'blue')
		{
			$color = "#33b5e5";
		}
		else if($_GET['theme'] == 'orange')
		{
			$color = "#d16500";
		}
		else if($_GET['theme'] == 'green')
		{
			$color = "green";
		}
		else if($_GET['theme'] == 'yellow')
		{
			$color = "#d6ae00";
		}
		else if($_GET['theme'] == 'purple')
		{
			$color = "#c400c4";
		}
		else if($_GET['theme'] == 'gray')
		{
			$color = "#aaa";
		}
	}
	else
	{
		$color = "#33b5e5";
	}
?>

body {
  background: #e9e9e9;
  color: #666666;
  font-family: 'RobotoDraft', 'Roboto', sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Pen Title */
.pen-title {
  padding: 50px 0;
  text-align: center;
  letter-spacing: 2px;
}
.pen-title h1 {
  margin: 0 0 20px;
  font-size: 48px;
  font-weight: 300;
}
.pen-title span {
  font-size: 12px;
}
.pen-title span .fa {
  color: <?php echo $color; ?>;
}
.pen-title span a {
  color: <?php echo $color; ?>;
  font-weight: 600;
  text-decoration: none;
}

/* Form Module */
.form-module-small {
  position: relative;
  background: #ffffff;
  max-width: 320px;
  width: 90%;
  border-top: 5px solid <?php echo $color; ?>;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
  padding: 10px;
}
.form-module-medium {
  position: relative;
  background: #ffffff;
  max-width: 500px;
  width: 90%;
  border-top: 5px solid <?php echo $color; ?>;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
  padding: 10px;
}
.form-module-extra-medium {
  position: relative;
  background: #ffffff;
  max-width: 650px;
  width: 90%;
  border-top: 5px solid <?php echo $color; ?>;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
  padding: 10px;
}
.form-module-large {
  position: relative;
  background: #ffffff;
  max-width: 1000px;
  width: 90%;
  border-top: 5px solid <?php echo $color; ?>;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
  padding: 10px;
}
.form-module .form {
  display: none;
  padding: 40px;
}
.form-module .form:nth-child(2) {
  display: block;
}
.form-module h2 {
  margin: 0 0 20px;
  color: <?php echo $color; ?>;
  font-size: 18px;
  font-weight: 400;
  line-height: 1;
}
.form-module input {
  outline: none;
  display: block;
  width: 100%;
  border: 1px solid #d9d9d9;
  margin: 0 0 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.form-module .medium-width {
  outline: none;
  display: block;
  width: 500px;
  border: 1px solid #d9d9d9;
  margin: 0 0 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.form-module .small-width {
  outline: none;
  display: block;
  width: 300px;
  border: 1px solid #d9d9d9;
  margin: 0 0 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.form-module select {
  outline: none;
  display: block;
  width: 100%;
  line-height: 35px;
  border: 1px solid #d9d9d9;
  margin: 0 0 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.form-module select option {
  height: 35px;
  line-height: 35px;
}
.form-module input:focus {
  border: 1px solid <?php echo $color; ?>;
  color: #333333;
}
.form-module button {
  cursor: pointer;
  background: <?php echo $color; ?>;
  width: 100%;
  border: 0;
  padding: 10px 15px;
  color: #ffffff;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.button-small {
  cursor: pointer;
  background: <?php echo $color; ?>;
  width: 100%;
  border: 0;
  padding: 10px 15px;
  color: #ffffff;
  -webkit-transition: 0.3s ease;
  text-decoration: none;
  transition: 0.3s ease;
}
.button-medium {
  cursor: pointer;
  background: <?php echo $color; ?>;
  width: 100%;
  border: 0;
  padding: 20px 35px;
  color: #ffffff;
  -webkit-transition: 0.3s ease;
  text-decoration: none;
  transition: 0.3s ease;
}
.button-large {
  cursor: pointer;
  background: <?php echo $color; ?>;
  width: 100%;
  border: 0;
  padding: 25px 55px;
  color: #ffffff;
  -webkit-transition: 0.3s ease;
  text-decoration: none;
  transition: 0.3s ease;
}

.button-large img {
  height: 48px;
  width: 48px;
  margin: -16px 16px -20px -46px;
}
.red {
	background: #ff2525 !important;
}
.green {
	background: #94bd17 !important;
}
.purple {
	background: purple !important;
}
.yellow {
	background: yellow !important;
}
.gray {
	background: #aaa !important;
}
.form-module button:hover {
  background: #178ab4;
}
.form-module .cta {
  background: #f2f2f2;
  width: 100%;
  padding: 15px 40px;
  box-sizing: border-box;
  color: #666666;
  font-size: 12px;
  text-align: center;
}
.form-module .cta a {
  color: #333333;
  text-decoration: none;
}
h2.headings {
	font-size: 2em;
	margin: 10px;
	padding: 10px;
	padding-bottom: 35px;
}
.content {
	clear: both;
	padding: 10px;
}
.disabled {
	opacity: 0.5;
	pointer-events: none;
	cursor: default;
}
table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	text-align: left;
	padding: 8px;
}

tr:nth-child(even){
	background-color: #f2f2f2
}

th {
	background-color: #4CAF50;
	color: white;
}

ul.top-menu {
    list-style-type: none;
    margin: -10px;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	border-bottom: 5px solid <?php echo $color; ?>;
	box-shadow: 0 3px 4px;
}

ul.top-menu li {
    float: left;
}

ul.top-menu li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.top-menu li a.side-menu {
	display: inline-block; 
	height: 30px; 
	text-align: center; 
	vertical-align: middle; 
	background: #911; 
	color: #fff; 
	text-decoration: none; 
	padding: 6px;
}
ul.top-menu li a.side-menu.active {
	background: #4CAF50;
}

ul.top-menu li a.side-menu img {
	vertical-align: middle; 
	padding-right: 5px;
	width: 28px;
}

ul.top-menu li a:hover:not(.active) {
    background-color: #111;
}

ul.top-menu .active {
    background-color: #4CAF50;
}
.note { 
	position: relative; 
	background: #f4fd4d; 
	padding: 20px;
	font-size: 1.2em; 
	border-radius: 1em; 
} 
.note:after { 
	content: ''; 
	position: absolute; 
	top: 0; 
	left: 50%; 
	width: 0; 
	height: 0; 
	border: 12px solid transparent; 
	border-bottom-color: #f4fd4d; 
	border-top: 0; 
	margin-left: -12px; 
	margin-top: -12px; 
}