<!--add header -->

<?php include_once __DIR__ . '/../header.php'; ?>



<!-- Left side column. contains the logo and sidebar -->



<!-- Content Wrapper. Contains page content -->



<style>
    #table_custom .table td.separator {
        background: black none repeat scroll 0 0;
        height: 3px;
        padding: 0;
    }
    #table_custom .table td.left_separator {
        border-left: 2px solid;
        font-weight: bold;
        text-align: right;
    }
</style>


       
    <div class="container memo_print_option custom_memo" >

        <div class="row" style="padding-top:0px">

            <h3 class="text-center top_margin_remover">Specimen Return Slip</h3>

            <table class="table table_custom" style="font-size:13px">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td><?= $memo_header_details['agent_name'] ?></td>
                    <td><strong>Code No:</strong></td>
                    <td><?= $memo_header_details['id_agent'] ?></td>
                    <td><strong>Specimen ID:</strong></td>
                    <td><?= $memo_header_details['id_specimen_total'] ?></td>
                </tr>
                <tr>
                    <td><strong>Mobile:</strong></td>
                    <td> <?= $memo_header_details['phone'] ?></td>
                    <td><strong>District:</strong></td>
                    <td><?= $memo_header_details['district'] ?></td>
                    <td><strong>Date:</strong></td>
                    <!--<td><?php echo " " . $memo_header_details['date_entry'] ?></td>-->
                    <td><?php echo " " . date('d-M-Y H:i:s', strtotime($memo_header_details['date_entry'])) ?></td>
                </tr>
            </table>
        </div>
        <div class="row" style="font-size:16px;">
            <?php echo $memo_body_table; ?>
            <div class="margin-top-10">
                <a href="<?= $base_url ?>" class="only_print btn btn-primary "><i class="fa fa-dashboard"></i> Go Dashboard</a>
                <a href="<?php echo site_url('specimen/specimen_return') ?>" class="only_print btn btn-primary "><i class="fa fa-pencil"></i> Specimen Return</a>
                <input class="only_print pull-right btn btn-primary" type="button"  onClick="window.print()"  value="Print This Page"/>
            </div>
        </div>
    </div>

