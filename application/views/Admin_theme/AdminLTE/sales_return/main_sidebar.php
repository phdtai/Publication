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
            
            
            <li class="header">Sales Return</li>
            
            <li><?php echo anchor('sales_return/', '<i class="fa fa-plus-circle"></i>  <span>Sales Return Dashboard</span>'); ?></li>
            <li><?php echo anchor('sales_return/sales_current_sales_return', '<i class="fa fa-plus-circle"></i>  <span>Current sales return</span>'); ?></li>
            <li><?php echo anchor('sales_return/sales_current_total_sales_return', '<i class="fa fa-plus-circle"></i>  <span>Current total sales return</span>'); ?></li>
       
            
            
            <li class="header">MAIN NAVIGATION</li>
            
            <li><?php echo anchor('admin/', '<i class="fa fa-plus-circle"></i>  <span>Main Dashboard</span>'); ?></li>
             <li><?php echo anchor('income/', '<i class="fa fa-plus-circle"></i>  <span>Income</span>'); ?></li>
            <li><?php echo anchor('loan/', '<i class="fa fa-plus-circle"></i>  <span>Loan</span>'); ?></li>
            <li><?php echo anchor('bank/', '<i class="fa fa-plus-circle"></i>  <span>Bank</span>'); ?></li>
            <li><?php echo anchor('salary/', '<i class="fa fa-plus-circle"></i>  <span>Salary</span>'); ?></li>
            <li><?php echo anchor('admin/manage_employee', '<i class="fa fa-plus-circle"></i>  <span>Employee</span>'); ?></li>
           
            
        </ul>
            
    </section>
    <!-- /.sidebar -->
</aside>
