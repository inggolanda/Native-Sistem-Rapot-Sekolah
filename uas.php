<div class="portfolio-modal modal fade" id="nilaiUAS" tabindex="-1" role="dialog" aria-labelledby="nilaiUAS" aria-hidden="true">
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
                <!-- Portfolio Modal - Image -->
                <!--<img class="img-fluid rounded mb-5" src="img/portfolio/s.png" alt="">-->
                <!-- Portfolio Modal - Text -->
              
               	<div class="container">
					    		<div class="card o-hidden border-0 shadow-lg my-5">
					      		<div class="card-body p-0">
					        		<!-- Nested Row within Card Body -->
					            <div class="text-center">
					              <h1 class="h4 text-gray-900 mb-4">Nilai UAS</h1>
            					</div>
                      <div class="text-left col-5">
                        <h5><?php echo $mapel;?></h5>
                      </div>
	              			<?php
                        if (isset($_GET['iduas'])) {
                            echo '<form method="post" action="simpan_uas.php?iduas='.$iduas.'" enctype="multipart/form-data">';                    
                        } else {
                            echo '<form method="post" action="simpan_uas.php?id='.$id.'"enctype="multipart/form-data" >';                    
                        }
                      ?>
					              <div class="form-group">          
					              	<div class="col-sm-6 mb-3 mb-sm-0">
						                <div class="input-group date">
						                    <div class="input-group-addon">
						                      
						                      <i class="fa fa-calendar"></i>
						                 		</div>
						                   &ensp;
					                    <input type="text" class="form-control pull-right" id="datepicker3" name="tgluas" value="<?php echo $tgl;?>" >
					                  </div>
					                </div>
					              </div>  
	                			<br>
                        <div class="col-sm-8">
					                    <select id="siswauas" class="form-control" name="NIS">
                              <option value="">Nama Siswa</option>
                              
                                        <?php
                                        $squery ="SELECT * FROM kelas INNER JOIN staff ON kelas.id_staff = staff.id_staff 
                                        JOIN siswa ON kelas.NIS = siswa.NIS ORDER BY
                                        nama_siswa ASC"  ;
                                        $kelassiswa1 = mysqli_query($conn,$squery) or die (mysqli_error($conn));
                                            while ($rowS1=mysqli_fetch_array($kelassiswa1)):;?>
                                            <?php 
                                                if (isset($_GET['iduas'])) { ?>
                                                <option <?php if($NIS==$rowS1['NIS']){ echo "selected"; } ?> value="<?php echo $rowS1['NIS'];?>">
                                                <?php echo $rowS1['nama_siswa']; ?> 
                                                </option>                          
                                                <?php } else {
                                            ?>
                                            <option value="<?php $idsis= $rowS1['NIS']; echo $idsis;?>">
                                                <?php echo $rowS1['nama_siswa'];?> 
                                            </option>

                                        <?php } endwhile; ?>
					                	</select>
					                </div>
					                <br>
				              	<div class="form-group">
                                  <div class="col-sm-8">
					                          <select id="kelasuas" type="text" class="form-control" name="kelas" placeholder="keas">
                                      <option value="">Kelas</option> 
					                	        </select>
					                </div>
					                <br>
					            	    <div class="col-sm-6">
					                    <input type="text" class="form-control" name="nilai" placeholder="Nilai UTS " value="<?php echo $Nilaiuas ?>">
                             </div>
                             <br>
                             <div class="form-group">
                               <textarea name="pesan" class="form-control" id="exampleFormControlTextarea4" rows="8" placeholder="Masukan "><?php echo $Pesan ?></textarea>
                              </div>			
					              	</div>
					            </div>
				    						
				    						<div class="box-footer">
				                  <input type="submit" name="addCustomer" class="btn btn-primary" value="Submit"/>
				              	</div>
				                 </form> 
                         <br>
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
  </div>
  <script>
  $(function(){
    $('#datepicker3').datepicker({
      autoclose: true,
      daysOfWeekDisabled: [0]
    })
  });
    
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <script>
       
                  $(document).ready(function(){
                  $('#siswauas').change(function(){
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
                          $('#kelasuas').html(data);
                          console.log(data)
                          }
                        }) 
                      });
                     });
              </script>
