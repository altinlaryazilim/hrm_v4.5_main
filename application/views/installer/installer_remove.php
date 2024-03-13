<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $title;?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/installer/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/installer/css/installer.css" rel="stylesheet">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content-wrapper">
                <div class="container"> 
                    <!-- begin of row -->
                    <div class="row"> 
                        <div class="box px-sm-15"> 
                            <div class="page-content">
                                <div class="outer-container">

                                    <?php 
                                    $error_msg = $this->session->userdata('error_msg');
                                    if(isset($error_msg) && !empty($error_msg)){ ?>

                                    <div class="alert alert-dismissable bg-exception btn-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $error_msg; ?>
                                    </div> 

                                    <?php }?>
                                    

                                    <div class="box-inner">
                                        <div class="inner">
                                            <img src="<?php echo base_url()?>assets/installer/img/001-trash-bin.png" alt="">
                                            <h4>Kurulum sihirbazını silerek uygulamanızı çalıştırın</h4>
                                        </div>
                                        <div class="text-right">
                                            <a href="<?php echo base_url()?>installer/remove_installer" class="btn btn-danger btn-block">Şimdi Sil</a>
                                        </div>
                                        <div class="text-center bordered-area">
                                            <span>veya</span>
                                        </div>
                                    </div>                            
                                    <div class="instruction">
                                        <h5 class="no-text">Eğer kurulum sihirbazını silme izniniz yoksa !</h5>
                                        <p class="text-success">Lütfen aşağıdaki adımları izleyin.</p>
                                        <ul class="step-list">
                                            <li><span>1.</span> Tüm dosyaların bulunduğu sunucunun kök klasörüne gidin. örn: public_html/</li>
                                            <li><span>2.</span> install klasörünü silin.</li>
                                            <li><span>3.</span> Ardından bu sayfayı yenileyin veya aşağıdaki düğmeye tıklayın.</li>
                                        </ul>
                                        <div class="text-right">
                                            <a href="<?php echo base_url()?>installer" class="btn btn-refresh">Yenile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.End of page wrapper -->
                    <footer class="footer text-center">
                        <div class="container">
                            <div class="fText">Geliştirici: <a target="_blank" href="https://www.bdtask.com/">bdtask</a></div>
                        </div>
                    </footer>
                    <!-- /.End of footer -->
                </div> 
                
            </div>
        </div>
        
        <script src="<?php echo base_url()?>assets/installer/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/installer/js/bootstrap.min.js"></script>
        
    </body>
</html>
