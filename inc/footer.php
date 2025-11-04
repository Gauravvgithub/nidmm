	<div class="whatsapp">
		<a href="https://wa.me/+919909930993" target="_blank">
			<i class="fa-brands fa-whatsapp"></i>
		</a>
	</div>

	<style>
		.whatsapp {
			opacity: 0.8;
			position: fixed;
			bottom: 90px;
			right: 20px;
			z-index: 9999;
			background-color: #25d366;
			color: #fff;
			width: 47px;
			height: 47px;
			text-align: center;
			line-height: 47px;
			border-radius: 50%;
			font-size: 32px;
			cursor: pointer;
			transition: all 0.3s;
			text-decoration: none;
		}
	</style>
<footer class="footer" style="background-image:url('img/map.webp')">

	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Footer About -->
					<div class="single-widget footer-about widget">
						<div class="logo">
							<div class="img-logo">
								<a class="logo" href="index.php">
									<img class="img-responsive" src="img/logo2.webp" width="60%" style="text-align: center;" alt="logo">
								</a>
							</div>
						</div>
						<div class="footer-widget-about-description">
							<p style="line-height: 20px;">
								<!-- NIDMM is the Best National Institute of Digital Media Marketing for all. -->
								At NIDMM, we provide high-quality education and training in all aspects of digital marketing.
							</p>
						</div>
						<div class="social">
							<!-- Social Icons -->
							<ul class="social-icons">
								<li><a class="facebook" href="https://www.facebook.com/nidmmdelhi" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
								<!-- <li><a class="twitter" href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a></li> -->
								<li><a class="linkedin" href="https://www.linkedin.com/company/national-institute-of-digital-media-marketing/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
								<!-- <li><a class="pinterest" href="#" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a></li> -->
								<li><a class="instagram" href="https://www.instagram.com/nidmmdelhi/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>

								<li><a href="https://www.youtube.com/@nidmmdelhi" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>

							</ul>
						</div>
					</div>
					<!--/ End Footer About -->
				</div>
				<div class="col-lg-2 col-md-6 col-12">
					<!-- Footer Links -->
					<div class="single-widget f-link widget">
						<ch3 class="widget-title">institution</ch3>
						<ul>
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="courses.php">Our Courses</a></li>
							<li><a href="contact.php">Contact us</a></li>
							<li><a href="terms.php">Terms &amp; Conditions</a></li>
							<li><a href="privacy-policy.php">Privacy Policy</a></li>
							<li><a href="refund-policy.php">Refund Policy</a></li>


						</ul>
					</div>
					<!--/ End Footer Links -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Footer News -->
					<div class="single-widget footer-news widget">
						<table style="margin-top:48px" class="table table-striped">
							<thead>
								<tr>
									<th>
										Blog Post
									</th>
								</tr>
							</thead>
							<tbody id="data">

							</tbody>
						</table>
						<!--/ End Single News -->
					</div>
					<!--/ End Footer News -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Footer Contact -->
					<div class="single-widget footer_contact widget">
						<ch3 class="widget-title">Contact</ch3>
						<ul class="address-widget-list">
							<li class="footer-mobile-number"><i class="fa fa-phone"></i><a href="tel:+91-99-0993-0993">+91-99-0993-0993</a></li>
							<li class="footer-mobile-number"><i class="fa fa-envelope"></i><a href="mailto:contact@nidmm.in">contact@nidmm.in</a></li>
							<li class="footer-mobile-number"><i class="fa-solid fa-location-dot"></i><a href="https://maps.app.goo.gl/YRd51aArvx7iYwtR9">
								B-27/A, Third Floor,<br> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dwarka Mor,Patel Garden <br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec-15, Dwarka (Near<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dwarka Hospital) Delhi-78
							</a>

							  
							</li>
						</ul>
					</div>
					<!--/ End Footer Contact -->
				</div>
			</div>
		</div>
	</div>
	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="copyright-content">
						<!-- Copyright Text -->
						<p>Copyright © 2025 NIDMM | All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Copyright -->
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
	var url = "https://nidmm.in/blog/"
	var number = 30
	getBlogPost(url, number)

	function getBlogPost(url, number) {
		$.ajax({
			method: "GET",
			url: `https://nidmm.in/blog/wp-json/wp/v2/posts?_fields[]=title&_fields[]=date&_fields[]=link&per_page=2`,
			success: function(data) {
				console.log(data)
				data.forEach(post => {
					$('#data').append(`
					<tr>
						<td>
							<a href="${post.link}" target="_blank" class="post-title-date">${post.title.rendered} <br> ${post.date}
						</td>
					</tr>
					`)
				})
			}
		})
	}
</script>