<!-- ***************** - BEGIN Header - ***************** -->
<?php include("header.php"); ?>
<!-- ***************** - END Header - ***************** -->

<body class="color-1 pattern-1 h-style-1 text-1">
	
	<!-- ***************** - BEGIN Top Holder - ***************** -->
	<div class="top-holder"></div><!--/ top-holder-->
	<!-- ***************** - END Top Holder - ******************* -->
	
	
	<!-- ***************** - BEGIN Wrapper - ******************* -->
	<div id="wrapper">
		
		
		<!-- ***************** - BEGIN Header - ******************* -->
		<?php include("logo_header.php"); ?>
		<!-- ***************** - END Header - ******************* -->
		
		
		<div id="content-wrapper">
			<section id="content">

				<!-- ************ - BEGIN Navigation - ************** -->
				<?php include("navigation.php"); ?>
				<!-- ************ - END Navigation - ************** -->


				<!-- ************ - BEGIN Slider - ************** -->
				<div id="slider" class="nivoSlider">
					<div id="imageSlider">
						<?php	include "connection.php";
						$resultslider = mysql_query("select * from 3dflash ") or die("error in query");
						
						while($rowslider=mysql_fetch_assoc($resultslider)){	?>
							<img src="images/sliders/<?php echo $rowslider['image'];?>" height="415" width="770" alt="" title="<div class='alignleft'><h3><?php echo $rowslider['heading'];?></h3><span class='desc'><?php echo $rowslider['tag_line'];?></span></div><p><?php echo $rowslider['description'];?></p>"/>
						<?php }	?>
					</div>
				</div><!--/ slider-->	
				<!-- ************ - END Slider - ************** -->


				<!-- ************ - BEGIN Content Wrapper - ************** -->
				<div class="content-wrapper">
					
					<div class="one_third">
						<div class="title-with-icon clearfix">
							<img class="alignleft" src="images/icons/icon7.png" alt="" />
							<a href="#"><h5 class="title-bord">Duis aute irure dolor</h5></a>	
						</div><!--/ .title-with-icon-->
						
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
							ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
					</div><!--/ .one_third-->
					
					<div class="one_third">
						<div class="title-with-icon clearfix">
							<img class="alignleft" src="images/icons/icon8.png" alt="" />
							<a href="#"><h5 class="title-bord">Labore et dolore</h5></a>	
						</div><!--/ .title-with-icon-->
						
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
							ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
					</div><!--/ .one_third-->
					
					<div class="one_third_last">
						<div class="title-with-icon clearfix">
							<img class="alignleft" src="images/icons/icon9.png" alt="" />
							<a href="#"><h5 class="title-bord">Magna aliqua enim</h5></a>	
						</div><!--/ .title-with-icon-->
						
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
							ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
					</div><!--/ .one_third_last-->
					
					
					<div class="sep"></div>
					
					
					<div class="one_third">
						
						<a href="#"><img class="add-border" src="images/temp/temp_img_1.jpg" alt="" /></a>
						
						<div class="aligncenter">
							<a href="#"><h5 class="content-title">Excepteur sint occaecat</h5></a>
							<p>
								Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
								dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							</p>
							<a href="typography.html" class="button green small">Read more</a>	
						</div><!--/ .align-center-->

					</div><!--/ one_third-->
					
					<div class="one_third">
						
						<a href="#"><img class="add-border" src="images/temp/temp_img_2.jpg" alt="" /></a>
						
						<div class="aligncenter">
							<a href="#"><h5 class="content-title">Oluptate velit esse cillum </h5></a>
							<p>
								Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
								dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							</p>
							<a href="typography.html" class="button green small">Read more</a>	
						</div><!--/ .align-center-->

					</div><!--/ one_third-->
					
					<div class="one_third_last">
						
						<a href="#"><img class="add-border" src="images/temp/temp_img_3.jpg" alt="" /></a>
						
						<div class="aligncenter">
							<a href="#"><h5 class="content-title">Dolore eu fugiat nulla pariatu</h5></a>
							<p>
								Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
								dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							</p>
							<a href="typography.html" class="button green small">Read more</a>	
						</div><!--/ .align-center-->

					</div><!--/ one_third_last-->
					
					
					<div class="clear"></div>
					
				</div><!--/ content-wrapper-->

			</section><!--/ content-->
			
			
			<!-- ***************** - Begin Footer - ***************** -->	
			<footer>
				
				<div class="entry-footer">
					
					<div class="one_third">
						<h3>Twitter Feed</h3>
						<div id="jstwitter"></div>
					</div><!--/ one_third-->
					
					<div class="one_third">
						<h3>From The Blog</h3>
						<div class="latest_posts">
							<ul>
								<li>
									<span class="small-custom-frame">
										<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-1.jpg" alt="" /></a>
									</span>
									<a href="blog-details.html" class="teaser-title">Lorem ipsum dolor sit amet consectetur</a>
									<div class="teaser-date">Posted on Now 25, 2011</div>
									<div class="clear"></div>
								</li>
								<li>
									<span class="small-custom-frame">
										<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-2.jpg" alt="" /></a>
									</span>
									<a href="blog-details.html" class="teaser-title">Ipsum dolor sit amet consectetur adipisicing</a>
									<div class="teaser-date">Posted on Now 25, 2011</div>
									<div class="clear"></div>
								</li>
								<li>
									<span class="small-custom-frame">
										<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-3.jpg" alt="" /></a>
									</span>
									<a href="blog-details.html" class="teaser-title">Dolor sit amet consectetur adipisicing elit</a>
									<div class="teaser-date">Posted on Now 25, 2011</div>
									<div class="clear"></div>
								</li>
							</ul>
							<a class="see-all" href="blog-style1.html">See all</a>
						</div><!--/ latest_posts-->
					</div><!--/ one_third-->
					
					<div class="one_third_last">
						<h3>Contact Info</h3>
						<div class="widget_text widget">
							<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
							<strong>Phone: +00 123456789</strong> <br />
							<strong>E-mail:</strong> <a href="mailto:yoursite@yoursite.com">yoursite@yoursite.com</a>
						</div><!--/ widget_text-->
						
						<div class="social_widget widget">
							<h3>Socialize With Us</h3>
							<ul>
								<li data-tooltip="Tooltip - Optional description can go here!"><a class="social_icon1" href="#">Facebook</a></li>	
								<li data-tooltip="Tooltip - Optional description can go here!"><a class="social_icon2" href="#">Twitter</a></li>
								<li data-tooltip="Tooltip - Optional description can go here!"><a class="social_icon3" href="#">Rss</a></li>
							</ul>
						</div><!--/ social_widget-->
						
					</div><!--/ one_third_last-->
					
					<div class="clear"></div>
					
				</div><!--/ entry-footer-->
				
			</footer><!--/ footer-->
			<!-- ***************** - END Footer - ***************** -->		
			
			
			<!-- ***************** - BEGIN Copyright - ***************** -->	
			<div class="copyright">Copyright &copy; 2012. ThemeMakers. All rights reserved</div>
			<div class="developed">developed by <a target="_blank" href="http://webtemplatemasters.com">ThemeMakers</a></div>
			<!-- ***************** - END Copyright - ***************** -->	
			
			
		</div><!--/ #content-wrapper-->
		
		
		<!-- ***************** - BEGIN Sidebar - ******************* -->
		<aside id="sidebar">
			
			
			<!-- ************* - BEGIN Categories Widget - *************** -->
			<div class="categories_widget widget">
				<h3 class="widget-title">Categories</h3>
				<ul class="categories">
					<li><a href="blog-style1.html">Lorem ipsum dolor sit amet</a></li>
					<li><a href="blog-style2.html">Consectetur adipisicing </a></li>
					<li><a href="blog-style2.html">Elit sed do eiusmod </a></li>
					<li><a href="blog-style1.html">Tempor incididunt ut labore </a></li>
					<li><a href="blog-style2.html">Et dolore magna aliqua</a></li>
					<li><a href="blog-style1.html">Ut enim ad minim </a></li>
					<li><a href="blog-style2.html">Veniam quis nostrud</a></li>
					<li><a href="blog-style1.html">Esse cillum dolore eu </a></li>
					<li><a href="blog-style2.html">Fugiat nulla pariat</a></li>
					<li><a href="blog-style1.html">Excepteur sint occaeca</a></li>
					<li><a href="blog-style2.html">Cupidatat non</a></li>
				</ul>
			</div><!--/ categories_widget-->
			<!-- ************* - END Categories Widget - *************** -->
			
			
			<!-- ************* - BEGIN Testimonials Widget - *************** -->
			<div class="testimonials widget">
				<div class="quote-text">
					<p>"Etiam consequat, tortor nec feugiat faucibus, libero eget ullamcorper"
						<span class="quote-author">-Brandon Green-</span>
					</p>
				</div><!--/ quote-text-->
				<div class="quote-text">
					<p>"Cras euismod, est et semper viverra, augue magna luctus neque, ac tincidunt felis nisl euismod nisi."
						<span class="quote-author">-John Resig-</span>
					</p>
				</div><!--/ quote-text-->
				<div class="quote-text">
					<p>"Quisque sit amet odio eu ipsum sollicitudin porttitor ut a nisl. Vestibulum lobortis ultrices justo, id feugiat enim fermentum non. "
						<span class="quote-author">-Amanda Smith-</span>
					</p>
				</div><!--/ quote-text-->
			</div><!--/ testimonials -->
			<!-- ************* - END Testimonials Widget - *************** -->
			
			
			<!-- ************* - BEGIN Latest Widget - *************** -->
			<div class="latest_posts widget">
				<h3 class="widget-title">Latest News</h3>
				<ul>
					<li>
						<span class="small-custom-frame">
							<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-1.jpg" alt="" /></a>
						</span>
						<a href="blog-details.html" class="teaser-title">Lorem ipsum dolor sit amet consectetur</a>
						<div class="teaser-date">Posted on Now 25, 2011</div>
						<div class="clear"></div>
					</li>
					<li>
						<span class="small-custom-frame">
							<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-2.jpg" alt="" /></a>
						</span>
						<a href="blog-details.html" class="teaser-title">Ipsum dolor sit amet consectetur adipisicing</a>
						<div class="teaser-date">Posted on Now 25, 2011</div>
						<div class="clear"></div>
					</li>
					<li>
						<span class="small-custom-frame">
							<a href="blog-details.html"><img class="alignleft" src="images/temp/sample-post-2.jpg" alt="" /></a>
						</span>
						<a href="blog-details.html" class="teaser-title">Ipsum dolor sit amet consectetur adipisicing</a>
						<div class="teaser-date">Posted on Now 25, 2011</div>
						<div class="clear"></div>
					</li>
				</ul>
				<a class="see-all" href="blog-details.html">See all news</a>
			</div><!--/ latest_posts-->
			<!-- ************* - END Latest Widget - *************** -->
			
			
		</aside><!--/ sidebar-->
		<div class="clear"></div>
		<!-- ***************** - END Sidebar - ******************* -->
		

	</div><!--/ wrapper--> 
	<!-- ***************** - END Wrapper - ***************** -->
	
	<div id="back-top">
		<a href="#top"></a>
	</div><!--/ back-top-->
	
	<div id="control_panel">
		<a href="#" id="control_label"></a>
	</div><!-- #control_panel -->
	
<script type="text/javascript" src="js/general.js"></script>
</body>
</html>

