<?php

$pages = paginationDemandeAdmin();
?>
	


	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		
	<div align="center">
		
				
	
	<div id="content2" ></div>
	
				

	<table  class="style1">
	<tr><Td>
			<ul id="pagination">
			
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li style="list-style: none;float: left;margin-right: 16px;padding:5px;border:solid 1px #dddddd;color:#0063DC;" id="'.$i.'">'.$i.'</li>';
				}
				?>

	</ul>	
	</Td></tr></table></div>

	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content2").load("FO/VUES/Demande/pagination_DemandeAdmin.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content2").load("FO/VUES/Demande/pagination_DemandeAdmin.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>