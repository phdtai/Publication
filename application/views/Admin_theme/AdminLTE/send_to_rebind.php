<!--add header -->
<?php include_once 'header.php';  ?>

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
         <?php if (isset($return_book_page)) { ?>
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
        
        
                        <div class="box-header">
                            <?php if(isset($date_range) && !empty($date_range)){ ?>
                            
                            <input class="only_print pull-right btn btn-primary" type="button"  onClick="window.print()"  value="Print Report"/>
                                
                                                      
                                <?= $main_content; ?>
                            
<!--                            <h3 class="box-title">Declared Returned Book Value: <?php //$total_return_book_price; ?>TK</h3>-->
                  
                            <?php } ?>
                           
                        </div><!-- /.box-header -->
                        
         <?php } ?>
    
    </scetion>

    <!-- Main content -->
    <section class="content">
        <div class="row">
<!--            <div class="col-md-12">
                <?php
//                if (current_url() == site_url('admin/manage_contact')) {
//                    echo anchor("admin/manage_contact_teacher", 'Click here for Teacher Contact', 'class="btn btn-primary pull-right position_top" title="Teacher Contact"');
//                }
                ?>
            </div>-->
            <?php
//            if (isset($filter_form_enabled) && $filter_form_enabled) {
//                include 'section-contact_filter.php';
//            }
            ?>
            <div class="col-md-12">
                <div class="box">
                    
                    <?php
                   if(!isset($date_range)){
                    echo $glosary->output;
                   }
                    ?>
                </div>
            </div>

            <?php
            if(!isset($date_range)){
                
           
            if (isset($total_book_return_section)) { ?>
                
            
                <div class="col-md-3">
                    <label>Select Book Name :</label>
                </div>
                <div class="col-md-6">
                    <?= $book_send_dropdown ?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <label>Number of Book Send to Re-bind:</label>
                </div>
                <div class="col-md-9" id="total_book_return">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <label>Total Number of Book Send to Re-bind:</label>
                </div>
                <div class="col-md-9">
                    <?= $total_book_send ?>
                </div>
                
            <?php } }?>

        </div>





  






    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

      <div class="box-body report-logo-for-print" style="background:#fff">
          <p class="pull-right" style="margin-right:20px">Report Date: <?php echo date('Y-m-d'); ?></p>
            <?= $main_content; ?>
        </div>

<?php include_once 'footer.php'; ?>
