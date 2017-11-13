<style type="text/css">
                input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}  



</style>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo "Mi Perfil"; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">

              <center>
                     
                       <div class="col-md-12 ">

                <div class="panel panel-default">
                 
                   <div class="panel-body">
                       
                    <div class="box box-info">
                        
                            <div class="box-body">
                                     <div class="col-sm-6">
                                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                                
                                <input id="profile-image-upload" class="hidden" type="file">
                
                                <!--Upload Image Js And Css-->
                           
                              
                   
                                
                                
                                     
                                     
                                     </div>
                              
                              <br>
                    
                              <!-- /input-group -->
                            </div>
                            <?php foreach ($perfil as $key ) {
                                # code...
                               ?>
                            <div class="col-sm-6">

                              
                            <h4 style="color:#00b1b1;"><?php echo $key['Nombre']; ?></h4></span>
                              <span><p><?php echo $key['Tipo_usuario']; ?></p></span>            
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">
                    
                              
                <div class="col-sm-5 col-xs-6 tital " >Nombres:</div><div class="col-sm-7 col-xs-6 "><?php echo $key['Nombre']; ?></div>
                     <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Apellidos:</div><div class="col-sm-7"><?php echo $key['Apellidos']; ?></div>
                  <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Dirección</div><div class="col-sm-7"><?php echo $key['Direccion']; ?></div>
                  <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Telefono:</div><div class="col-sm-7"><?php echo $key['Telefono']; ?></div>

                  <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Correo:</div><div class="col-sm-7"><?php echo $key['Correo']; ?></div>
                 <div class="clearfix"></div>
                <div class="bot-border"></div>

                 <div class="col-sm-5 col-xs-6 tital " >Empresa:</div><div class="col-sm-7">GLO</div>
              
                <?php } ?>
               


                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->

                        </div>
                       
                            
                    </div> 
                    </div>
                </div>  
                    <script>
                              $(function() {
                    $('#profile-image1').on('click', function() {
                        $('#profile-image-upload').click();
                    });
                });       
                              </script> 
                       


              </center>
               
               
                
                        
                   
       
       
       
       
                





            </div>
            
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 

