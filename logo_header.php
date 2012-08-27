		<header class="clearfix">
			<div class="logo">
				
				<?php	include "connection.php";
						$resultlogo = mysql_query("select * from logo where id=(SELECT MAX(id) FROM logo)");
						
					while($rowlogo=mysql_fetch_assoc($resultlogo)){	?>
						<a href="index.php"><img src="images/logo/<?php echo $rowlogo['image'];?>" alt="" border="0" width="192 " height="102"/></a>
				<?php }	?>
			
			</div><!--/ logo-->
			<div class="info-call">
				<p>
					For additional information call: <span>+00 123456789</span>
				</p>
			</div><!--/ info-call-->
		</header>
