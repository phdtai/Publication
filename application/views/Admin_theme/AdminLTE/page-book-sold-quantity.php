<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * File Developed by MD; Mashfiqur Rahman
 * Email : mashfiqnahid@gmail.com
 * Website : mashfiqnahid.com
 */

include_once 'header.php';
?>

<!-- Left side column. contains the logo and sidebar -->
<?php include_once 'main_sidebar.php'; ?> <!-- main sidebar area -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small>Manage <?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= $base_url ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $Title ?></li>
        </ol>
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        
                        <div class="box only_print">
                            <div class="box-body">
                                <?php
                
                    $attributes = array(
                        'clase' => 'form-inline',
                        'method' => 'post');
                    echo form_open('', $attributes)
                    ?>
                    <div class="form-group col-md-4 text-left">
                        
                        <label>Search Report With Date Range:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="date_range" value="<?= isset($date_range) ? $date_range : ''; ?>" class="form-control pull-right" id="reservation" pattern="([0-1][0-2][/][0-3][0-9][/][0-2]{2}[0-9]{2})\s[-]\s([0-1][0-2][/][0-3][0-9][/][0-2]{2}[0-9]{2})" title="This is not a date"/>
                            <br>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <?= anchor(current_url() . '/reset_date_range', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                    <?= form_close(); ?>
                <?php  ?>
                            </div>
                        </div>
                        
                            
                        <div class="box-header ">
                            <?php if(!isset($date_range)){ ?>
                            <h3 class="box-title">আজকের বিক্রীত বইসমূহ </h3>
                            
                            <?php }else{ ?>
                            <h3 class="box-title">মোট বিক্রীত বইসমূহ </h3>
                            
                            <?php } ?>
                           
                        </div><!-- /.box-header -->
                        <div class="box-body with-border">
                                   
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="only_print pull-right btn btn-primary" type="button"  onClick="window.print()"  value="Print This Page"/> 
                                    
                                    <!--content goes here-->
                                    <?= $main_content ?>
                                    
                                </div>
                            </div>
                            
                        </div>
                       
                             
                    </div>
                </div>
            </div>
        </section>
</div><!-- /.content-wrapper --> 

<?php include_once 'footer.php'; ?>