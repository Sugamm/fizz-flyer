<?php include 'code/head.php';?>
<!--//-->	
<div class=" banner-buying">
	<div class=" container">
	<h3><span>404</span> Page Not Found</h3> 
	<!---->
	<div class="menu-right">
		<ul class="menu">
			<li class="item1"><a href="#"> Menu<i class="glyphicon glyphicon-menu-down"> </i> </a>
			<ul class="cute">
				<li class="subitem1"><a href="index.php">Home </a></li>
				<li class="subitem2"><a href="contact.php">Contact </a></li>
				<li class="subitem3"><a href="register.php">Register </a></li>
				<li class="subitem1"><a href="suggestion.php">Suggestion</a></li>
				<li class="subitem2"><a href="terms.php">Terms </a></li>
				<li class="subitem3"><a href="faqs.php">FAQ </a></li>
			</ul>
		</li>
		</ul>
	</div>
	<div class="clearfix"> </div>
		<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
      		
	</div>
</div>
<!--//header-->
<!---->
<div class="container" style="background:#f8f8f8;">
	<div class="home-loan">
		<h3>PAGE NOT FOUND</h3>
		<div class="loan-point">
			<a href="single.html"><img class="img-responsive" src="images/404.jpg" alt=""></a>
		</div>
	</div>
</div>
		
<!-- <div class="loan-col-bottom">
<div class="container">
		<div class="loan-col-top">
			<div class="col-md-4 loan-grid">
				<img class="img-responsive" src="images/lo.png" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="col-md-4 loan-grid">
				<img class="img-responsive" src="images/lo1.png" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="col-md-4 loan-grid">
				<img class="img-responsive" src="images/lo2.png" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="loan1">	
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit</p>		
		<a href="loan_single.html" class="hvr-sweep-to-right">Apply Now</a>
	</div>
	</div>
</div> -->

<!--footer-->
<?php include 'code/footer.php';?>
<!--//footer-->
</body>
</html>