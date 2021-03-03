		<div class="container" >
			<br />
			<br />
			<div class="form-group" >
				<div class="input-group">
					<span class="input-group-addon"></span>
					<input type="text" name="search_text" id="search_text" placeholder="Arama..." class="form-control" />
				</div>
			</div>
			<br />
			<br />
			<div id="result"></div>
		</div>

		<div style="clear:both"></div>
	<br />
<center><img src="" width="27px" height="14px"> |<a href="">Niko</a></center>
	
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
