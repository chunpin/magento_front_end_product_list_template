<?php
$_products = array('first product','second product','third product','fourth product', 'fifth product');	

?>


<?php if(count($_products) < 5 ):    ?>
	<?php  
		echo  'there is only ';
		echo count($_products);
		echo ' items here';
	?>

<?php else: ?>
	<?php foreach($_products as $_product): ?>
		<li> <?php  echo  $_product ?>  </li>
	<?php endforeach   ?>
<?php endif; ?>


