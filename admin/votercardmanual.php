<?php include('userHeader.php'); ?>



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
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="voterdet.php" style="width:100%">
									
									                                           <div class="row dgnform">
																			    <div class="col-md-8 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												  <a href="https://electoralsearch.in/" target="_blank">
												  <button type="button" id="submit" name="button" class="btn btn-info btn-block active
												  " style="border-radius: 20px;
    padding: 10px;background-color:#orange;border:1px solid orange;">Click Here for First Step</button> </a> </a>
												</div> 
									
									<br><br>
									
									<div class="row dgnform">
										<div class="row col-md-6 col-sm-6 col-xs-12">
										
										    <div class="col-md-12 col-sm-12 col-xs-12" id="file">
												<label>Upload nvsp File</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"   name="nvspfile" required="">
													<input type="hidden" id="uimg" name="uimg"/>
                                                </div> 
											</div>
											<br/>
											<!---<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Upload MPTASS KYC File</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"  name="imagefile" required="">
                                                </div> --->
											</div>
											
										    <div class="col-md-6 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <input type="submit" id="submit" name="submit" class="btn btn-success btn-block " style="border-radius: 20px;
    padding: 10px;background-color:#28a745;border:1px solid orange;" value="Save" disabled></input>
	<div id="result"></div>



	
	<script>
	
	$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
            );
    });
	</script> </div> 
											</div>
										</div></div>
									</div>
								</form>
							</div>
					   <section id="main-content">
                        <br><br><br>
                           <div class="col-md-12 col-sm-12 col-xs-12" >
                                
								
								
								
								
								<button type="button" id="button" name="button" class="btn btn-success btn-md video2" style="border-radius: 20px;
    padding: 10px;background-color:#F39C12;border:1px solid #F39C12;"><img src="1.gif" alt="Example" width="100" height="50">
                <font color="white"; size="6"> Traning Video</font></button>
								
								
												 
                                            <input type="hidden" id="deviceport" />
                                        </div>
                                    </div>
                                </div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>



<!------- For popup video------------->


<!------- For popup video------------->
<?php include('userFooter.php'); ?>

<link rel="stylesheet" href="popup1/videopopup.css" />


 <script src="popup1/videopopup.js"></script>
	<script type="text/javascript">
		$(function(){
			// Init Plugin
			$(".video1").videopopup({
				'videoid' : '-AntQ6UQBhQ',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
			$(".video2").videopopup({
				'videoid' : '-AntQ6UQBhQ',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
		});
    </script>