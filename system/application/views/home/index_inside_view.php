<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>
<body>
<div  class='container'    style='
	background:lightyellow;
	font-size:40px;
	'       >
Corkhub
</div>

<div  class='container'    style='
	background:lightblue;
	font-size:40px;
	'       >
<?php echo $products[0]->name;    ?>
</div>

<div  class='container'    style='
	background:lightred;
	font-size:40px;
	'       >
	

<img src='<?php  echo base_url() . '/uploads/' . $products[0]->vendor_id . '/' . $products[0]->id . '/image.png'  ?>'>
</div>

<div  class='container'    style='
	background:lightblue;
	font-size:40px;
	'       >
<?php echo $products[0]->description;    ?>
</div>


</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 