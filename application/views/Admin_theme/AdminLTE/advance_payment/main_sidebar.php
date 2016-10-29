<aside class="main-sidebar only_print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>/asset/img/<?= $this->config->item('SITE')['logo'] ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $this->config->item('main_sidebar_title') ?></p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <ul class="sidebar-menu">


            <li class="header">Advance payment</li>

            <li><?php echo anchor('advance_payment', '<i class="fa fa-plus-circle"></i>  <span>Add Advanced Payment</span>'); ?></li>
            <li><?php echo anchor('advance_payment/advance_balance', '<i class="fa fa-plus-circle"></i>  <span>Advanced Balance</span>'); ?></li>
            <li><?php echo anchor('advance_payment/payment_log', '<i class="fa fa-plus-circle"></i>  <span>Advanced Payment Log</span>'); ?></li>

            <?php $this->load->view($this->config->item('ADMIN_THEME') . 'sidebar_common'); ?>


        </ul>

    </section>
    <!-- /.sidebar -->
</aside>