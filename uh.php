<div class="portfolio-modal modal fade" id="nilaiUH" tabindex="-1" role="dialog" aria-labelledby="nilaiUH" aria-hidden="true">
  	<div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Nilai</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
               
               	<div class="container">
                  <?php 

                    $delete = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                                Data Berhasil Dihapus
                              </div>';

                    $tambah = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                                Data Berhasil Ditambah
                              </div>';

                    $edit = '<div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                              Data Berhasil Diedit
                            </div>';

                    if (isset($_GET['pesan'])) {
                        $notif = $_GET['pesan'];
                        if($notif==='delete'){
                            echo $delete;
                        } else if($notif==='tambah'){
                            echo $tambah;
                        } else {
                            echo $edit;
                        }
                    }
                  ?>
					    		<div class="card o-hidden border-0 shadow-lg my-8">
					      		<div class="card-body p-0">
					        		<!-- Nested Row within Card Body -->
					            <div class="text-center">
					              <h1 class="h4 text-gray-900 mb-4">Nilai Harian</h1>
                      </div>
                      <div class="text-left col-5">
                        <h5><?php echo $mapel;?></h5>
                      </div>
                      
	              			<?php
                        if (isset($_GET['iduh'])) {
                            echo '<form method="post" action="simpan_uh.php?iduh='.$iduh.'" enctype="multipart/form-data">';                    
                        } else {
                            echo '<form method="post" action="simpan_uh.php?id='.$id.'"enctype="multipart/form-data" >';                    
                        }
                      ?>                            
					              <div class="form-group">          
					              	<div class="col-sm-6 mb-3 mb-sm-0">
						                <div class="input-group date">
						                    <div class="input-group-addon">
						                      
						                      <i class="fa fa-calendar"></i>
						                 		</div>
						                   &ensp;
					                    <input type="text" class="form-control pull-right" id="datepicker7" name="tgluh" value="<?php echo $tgl;?>" >
					                  </div>
					                </div>
					              </div>  
	                			<br>
                        <div class="col-sm-8">
					                    <select id="siswa" class="form-control" name="NIS">
                              <option value="">Nama Siswa</option>
                                        <?php
                                            while ($rowS=mysqli_fetch_array($kelassiswa)):;?>
                                            <?php 
                                                if (isset($_GET['iduh'])) { ?>
                                                <option <?php if($NIS==$rowS['NIS']){ echo "selected"; } ?> value="<?php echo $rowS['NIS']; ?>">
                                                <?php echo $rowS['nama_siswa']; ?> 
                                                </option>                          
                                                <?php } else {
                                            ?>
                                            <option value="<?php $idsis= $rowS['NIS']; echo $idsis;?>">
                                                <?php echo $rowS['nama_siswa'];?> 
                                            </option>

                                        <?php } endwhile; ?>
					                	</select>
					                </div>
					                <br>
				              	<div class="form-group">
                                  <div class="col-sm-8">
					                          <select id="kelas" type="text" class="form-control" name="kelas" placeholder="keas">
                                      <option value="">Kelas</option>
					                	        </select>
					                </div>
					                <br>                   
	                
				                <div class="form-group">
				                  <div class="col-sm-4">
				                     	<input type="text" class="form-control" name="kepandaian" placeholder="Nilai Kepandaian" value="<?php echo $Kepandaian;?> ">
				                  </div>
				              	</div>
		              
					              <div class="form-group">
                            
						                <div class="col-sm-6">
						                  	<input type="text" class="form-control" name="proyek" placeholder="Nilai Proyek" value="<?php echo $Proyek;?>">
						                </div>
													
					            	    <div class="col-sm-6">
					                    <input type="text" class="form-control" name="Portfolio" placeholder="Nilai Portfolio" value="<?php echo $Portfolio;?>">
					                 	</div>			
					              	</div>
					            </div>
				    						
				    						<div class="box-footer">
				                  <input type="submit" name="addCustomer" class="btn btn-primary" value="Submit"/>
				              	</div>
				              </form> 
              			</div>
              		</div>
                  <button class="btn btn-primary" href="#" data-dismiss="modal">
				                  <i class="fas fa-times fa-fw"></i>
				                  Close Window
				            </button>
								  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  	<script>
  $(function(){
    $('#datepicker7').datepicker({
      autoclose: true,
      daysOfWeekDisabled: [0]
    });
    
  })
    
</script>

        
        <script>
       
                  $(document).ready(function(){
                  $('#siswa').change(function(){
                      //Selected value
                      var inputValue = $(this).val();
                      //alert("value in js "+inputValue);
                         //$.post('qlas.php', { dropdownValue: inputValue },function(data){
                          //alert('ajax completed. Response:  '+data);
                          
                           $.ajax({
                          url:"qlas.php",
                          method:"POST",
                          data:{dropdownValue:inputValue},
                          success:function(data){
                          $('#kelas').html(data);
                          console.log(data)
                          }
                        }) 
                      });
                     });
              </script>
            