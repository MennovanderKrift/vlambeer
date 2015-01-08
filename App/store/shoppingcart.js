<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	$('.add-to-cart').click(function(){
		var id = $(this).closest('tr').find('.product-id').text();
		var name = $(this).closest('tr').find('.product-name').text();
		var quantity = $(this).closest('tr').find('input').val();
		window.location.href = "add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
	});
	
	$('.update-quantity').click(function(){
		var id = $(this).closest('tr').find('.product-id').text();
		var name = $(this).closest('tr').find('.product-name').text();
		var quantity = $(this).closest('tr').find('input').val();
		window.location.href = "update_quantity.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
	});
});
</script>

