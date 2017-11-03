<style type="text/css">
  
  .jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}
</style>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo "Contacto"; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
               
                <div class="col-md-8">
            <div class="well well-sm">
                <form method="post" action="<?php echo base_url('admin/enviar_contact'); ?>">
                <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                            <label for="name">
                                Nombre </label>
                            <input type="text" name="nombre" class="form-control" id="name" placeholder="inserte su nombre" required="required" />
                        </div>
                       
                        <div class="form-group">
                            <label for="email">
                                Correo Eelectronico</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="correo" class="form-control" id="email" placeholder="Inserte Correo" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Asunto</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="Contacto" selected="">Contactos:</option>
                                <option value="Soporte">Soporte</option>
                                <option value="Aclaraciones">Aclaraciones</option>
                                <option value="otro">otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Enviar Correo</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Nuestras oficinas</legend>
            <address>
                <strong>GLO OFICINA COLIMA, MÉXICO</strong><br>
                
                <abbr title="Phone">
                   </abbr>
                01 (312) 313-8301
            </address>
            <address>
                <strong>GLO OFICINA CALIFORNIA, ESTADOS UNIDOS </strong><br>
                
                <abbr title="Phone">
                    </abbr>
                001 (818) 398-2120
            </address>
            </form>
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

 

