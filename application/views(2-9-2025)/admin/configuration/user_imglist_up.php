<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'yy-mm-dd'});
	})
</script> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
   <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
         
         
          
          <!-- /.box -->

          <!-- About Me Box -->
        
          <!-- /.box -->
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Employee Details</a></li>
            
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
               <?php foreach($elup as $row)
				{ ?>
              <form role="form" action="<?php echo base_url();?>Dashboard/eimglup" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="urid" value="<?php echo $row['urid']; ?>">
              
              
               <div class="form-group">
                  <label for="employeefile">User Photo</label>
                  <input type="file" name="pic_file">
				</div>
			  
             
				
				
                
                
                
                 
				
                
				
				
				
				
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
				 </form>
					
				<?php } ?>	
              </div>
             

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->

<script type="text/javascript">
$(document).ready(function(){

    $('#department').change(function(event){
        event.preventDefault();
		var department = $('#department').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_sectionname",
			dataType:"json",
                    data:{ department:department},
            success:function(res)
            	{
         		 	$('#section').find('option');
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#section').append('<option value="'+data['section']+'">'+data['section']+'</option>');
          			});
				}
        	});
    	});
	});
</script>
