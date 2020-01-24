<?php include('userHeader.php'); ?>

<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->

      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
              <h1>Votercard Entry Auto</h1>
								</div>
							</div>
						</div>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="voterdetails.php" style="width:100%">
									<div class="row dgnform">
										<div class="row col-md-6 col-sm-6 col-xs-12">
										    <div class="col-md-12 col-sm-12 col-xs-12">
												<label>Upload nvsp File</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"  name="nvspfile" required="">
                                                </div> 
											</div>
											<br/>
											<!---<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Upload MPTASS KYC File</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"  name="imagefile" required="">
                                                </div> --->
											</div>
										    <div class="col-md-12 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button> 
												</div> 
											</div>
										</div>
									</div>
								</form>
							</div>
					  <section id="main-content">
                        
                           <div class="col-md-12 col-sm-12 col-xs-12" >
                                <div class="card">
                                    
                                            <div class="col-md-6 col-sm-6 col-xs-6" >
												<label>Election KYC Link </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://electoralsearch.in" target="_blank">Election KYC LINK (CLICK HERE)</a>
												
												<br/><br/>
												
												<a href="#" type="button" id="button" name="button" active class="btn btn-primary btn-block active video1"> <i class="ti-control-play"></i> How to Use ? (TRANING VIDEO)</a> 
												 
                                            
                                        </div>
                                    </div>
                                </div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>


<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>


        <!-- jquery vendor -->
        
        <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
     		
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		
		
		<script type="text/javascript">
		/*	jQuery(function($) {
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});*/
		</script>
		 
		
        <!-- scripit init-->


        

    </body>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'sg2plcpnl0121'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script></html>

<<!------- For popup video------------->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="popup/videopopup.js"></script>
	<script type="text/javascript">
		$(function(){
			// Init Plugin
			$(".video1").videopopup({
				'videoid' : '0nb_kupG4b4',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
			$(".video2").videopopup({
				'videoid' : '9ipw_IQp8bg',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
		});
    </script>
<!------- For popup video-----------