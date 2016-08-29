<!--add header -->
<?php include_once __DIR__ . '/../header.php'; ?>

<!-- Left side column. contains the logo and sidebar -->
<?php include_once 'main_sidebar.php'; ?> <!-- main sidebar area -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small> <?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= $base_url ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Salary section</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-body">
                        <?php
                        $attributes = array(
                            'clase' => 'form-inline',
                            'method' => 'get');
                        echo form_open('', $attributes)
                        //echo form_open(base_url() . "index.php/bank/management_report", $attributes)
                        ?>

                        <div class="form-group col-md-4 text-left">

                            <label>Search Report With Date Range:</label>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_range" value="<?= isset($date_range) ? $date_range : ''; ?>" class="form-control pull-right" id="reservation"  title="This is not a date"/>
                                <br>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <?= anchor(current_url() . '/income', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                        <?= form_close(); ?>
                        <?php ?> 
                    </div>
                </div>
                <?php
                if (isset($date_range)) {
                    ?>
                    <div class="box" id="block">
                        <div class="box-body">
                            <h3 class="text-center">Total Report</h3>
                            <input style="margin-bottom: 10px;" class="only_print pull-right btn btn-primary" type="button" id="print"  onClick="printDiv('block')"  value="Print Report"/>
                            <table  class="table table-bordered report">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Total Sales</th>
                                        <td class="taka_formate"><?php echo (!empty($total->total_amount)) ? $total->total_amount : 0; ?></td>                              
                                    </tr>
                                    <tr>
                                        <th>Total Due</th>
                                        <td class="taka_formate"><?php echo (!empty($total->total_due)) ? $total->total_due : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sale Against Cash Collection</th>
                                        <td class="taka_formate"><?php echo $total_sale_against_cash_collection; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sale Against Bank Collection</th>
                                        <td class="taka_formate"><?php echo $total_sale_against_bank_collection; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sale Against Advance Deduction</th>
                                        <td class="taka_formate"><?php echo $total_sale_against_advance_deduction; ?></td>
                                    </tr>
                                    <tr>                     
                                        <th>Sale Against Due Collection</th>
                                        <td class="taka_formate"><?php echo $total_sale_against_due_collection; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered report" style="margin-top: 50px;">
                                <tr>
                                    <th>Total Due Collection</th>
                                    <td class="taka_formate"><?php echo $total_due_collection; ?></td>
                                </tr>
                                <tr>
                                    <th>Total Advance Collection (Without Book Sale)</th>
                                    <th class="taka_formate"><?php echo $total_advance_collection_without_book_sale; ?></th>
                                </tr>
                            </table>
                            <table class="table table-bordered report" style="margin-top: 50px;">
                                <tr>
                                    <th>Total Cash Collection (Customer payment + Advance Payment)</th>
                                    <th class="taka_formate"><?php echo "$total_cash_collection_from_customer_payment + $total_cash_collection_from_advance_payment = $total_cash_collection"; ?></th>
                                </tr>
                                <tr>
                                    <th>Total Bank Collection (Customer payment + Advance Payment)</th>
                                    <th class="taka_formate"><?php echo "$total_bank_collection_from_customer_payment + $total_bank_collection_from_advance_payment = $total_bank_collection"; ?></th>
                                </tr>
                            </table>
                            <table class="table table-bordered report" style="margin-top: 50px;">
                                <tr>
                                    <th>Total Collection(Cash +Bank)</th>
                                    <th class="taka_formate"><?php echo $total_collection_cash_bank; ?></th>
                                </tr>
                                <tr>
                                    <th>Total Expense</th>
                                    <th class="taka_formate"><?php echo $total_expence; ?></th>
                                </tr>
                            </table>

                            <table class="table table-bordered new" style="margin-top: 50px;">

                                <tr>
                                    <th>Opening Cash:</th>
                                    <th class="taka_formate"><?php echo (!empty($opening->opening_cash)) ? $opening->opening_cash : 0; ?></th>
                                    <th>Closing Cash:</th>
                                    <th class="taka_formate"><?php echo (!empty($closing->ending_cash)) ? $closing->ending_cash : 0; ?></th>
                                </tr>
                                <tr>
                                    <th>Opening Bank:</th>
                                    <th class="taka_formate"><?php echo (!empty($opening->opening_bank_balance)) ? $opening->opening_bank_balance : 0; ?></th>
                                    <th>Closing Bank:</th>
                                    <th class="taka_formate"><?php echo (!empty($closing->closing_bank_balance)) ? $closing->closing_bank_balance : 0; ?></th>
                                </tr>
                                <tr>
                                    <th>Opening Due:</th>
                                    <th class="taka_formate"><?php echo (!empty($opening->opening_due)) ? $opening->opening_due : 0; ?></th>
                                    <th>Closing Due:</th>
                                    <th class="taka_formate"><?php echo (!empty($closing->ending_due)) ? $closing->ending_due : 0; ?></th>
                                </tr>

                            </table>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>




    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- insert book -->



<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    .report thead tr th{
        padding: 20px 0!important;
        background: #5A99D4;
    }
    .report tbody tr th,tabel tbody tr td{
        min-width: 50%!important;
    }
    .report tbody tr:nth-child(odd), th table tbody tr:nth-child(odd) td{
        background: #DEECF9;
    }
    .new th{
        min-width: 100px!important;
        text-align: center;
        background: #fff!important;

    }
</style>