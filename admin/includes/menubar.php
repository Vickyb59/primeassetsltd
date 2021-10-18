<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? 'images/'.$admin['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['full_name']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="deposits.php"><i class="fa fa-bitcoin"></i> <span>Deposit Request</span></a></li>
      <li><a href="withdrawals.php"><i class="fa fa-money"></i> <span>Withdrawal Request</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li><a href="investment_plans.php"><i class="fa fa-edit"></i> <span>Investment Plans</span></a></li>
      <li><a href="investments.php"><i class="fa fa-handshake-o"></i> <span>Ongoing Investments</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Website Info</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="news.php"><i class="fa fa-paperclip"></i> <span>News</span></a></li>
          <li><a href="hp_deposits.php"><i class="fa fa-bitcoin"></i> <span>Latest Deposits</span></a></li>
          <li><a href="hp_withdrawals.php"><i class="fa fa-money"></i> <span>Latest Withdrawals</span></a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>