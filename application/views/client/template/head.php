<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0</title>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
    

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>plantilla/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>plantilla/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>plantilla/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>master">GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
                   
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                    
                        <li><a href="<?php echo base_url('login/log_out') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                             <center> <a href="<?php echo base_url('clients') ?>"><?php echo $this->session->userdata('email'); ?></a></center>  
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('clients') ?>"><i class="fa fa-dashboard fa-fw"></i>Panel</a>
                        </li>
                        

                           <li>
                            <a href="<?php echo base_url('clients/Provedores') ?>"><i class="fa fa-user fa-fw"></i>Provedores del sistema</a>
                        
                        </li>
                        
                       

                   
                        <li>
                            <a href="<?php echo base_url('clients/Movimientos') ?>"><i class="fa fa-car fa-fw"></i>Movimientos en Procesos</a>
                        
                        </li>


                         <li>
                            <a href="<?php echo base_url('clients/Movimientos_Facturas') ?>"><i class="fa fa-list fa-fw"></i>Confirmaciònes y Facturas</a>
                        
                        </li>

                
                         <li>
                            <a href="<?php echo base_url('clients/Contacto') ?>"><i class="fa fa-envelope-o"></i>Contacto</a>
                        
                        </li>
                      
                          
                            <!-- /.nav-second-level -->
                      
                        
                            <!-- /.nav-second-level -->
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            
        </nav>


        <body>

        <?php if(isset($pagina_interna)) { $this->load->view($pagina_interna);  ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url("plantilla/vendor/") ?>/jquery/jquery.min.js"></script>


    <footer class="sticky-footer">
      <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">Copyright © 2017 GLO LOGISTICS . Todos los derechos reservados.
           
      </p>

      <a href="#" class="navbar-btn btn-danger btn pull-right">
      <span class="glyphicon glyphicon-star"></span>GLO TRASPORTATON MANAGMENT SYSTEM TMS v2.0</a>
      
     
    </div>
    </footer>

    <?php   
        }
     ?>
  
 
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("plantilla/vendor") ?>/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url("plantilla/vendor/") ?>/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url("plantilla/vendor") ?>/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url("plantilla/vendor") ?>/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url("plantilla/data") ?>/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url("plantilla/dist") ?>/js/sb-admin-2.js"></script>


     


</body>

</html>