<div id="page-wrapper">
            
            
            <div class="row">
               
                <div class="container">
    <h1 class="well">Enviar Correos del Confirmacion y Facturas </h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form action="<?php echo base_url('users/enviar_movimientos') ?>" method="post">
          <div class="col-sm-12">
            <div class="row">

                <div class="col-sm-6 form-group">
                <label>Movimiento:</label>
                <input type="text" name="movimiento" placeholder="Ingrese Correo." value="<?php echo $movimiento ?>" class="form-control">
              </div>



              <div class="col-sm-6 form-group">
                <label>Cliente</label>
                <input type="text" name="client" placeholder="Ingrese Correo..." value="<?php echo $client ?>" class="form-control">
              </div>
            </div>     
              

              <div class="col-sm-6 form-group">
                <label>Correo Cliente:</label>
                <input type="email" name="cc" value="<?php echo $co ?>" placeholder="Ingrese Correo." class="form-control">
              </div>


              <div class="col-sm-6 form-group">
                <label>Cco</label>
                <input type="email" name="c1" placeholder="Ingrese Correo..." class="form-control">
              </div>
            </div>  


               
             

             <div class="col-sm-6 form-group">
                <label>Cco:</label>
                <input type="email" name="c2" placeholder="Ingrese Correo..." class="form-control">
              </div>


              <div class="col-sm-6 form-group">
                <label>Cco:</label>
                <input type="email" name="c3" placeholder="Ingrese Correo..." class="form-control">
              </div>
            </div>   



           

            <div class="col-sm-12 form-group">
              <label>Mensaje</label>
              <textarea name="mensaje" placeholder="Escriba Mensaje " rows="3" class="form-control"></textarea>
            </div>  
           
                 
          </div>
          <button type="submit" class="btn btn-lg btn-info">Enviar Correos</button>  
        </form> 
        </div>
  </div>
  </div>





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

 

