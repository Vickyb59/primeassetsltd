<?php

    $sql0 = "SELECT * FROM users WHERE id=$id";
    $result0 = $conne->query($sql0);
    $row0 = $result0->fetch_assoc();

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM direct_message WHERE user_id=0 || (user_id=$id && status=0)");
    $stmt->execute();
    $drow = $stmt->fetch();
    $no_of_msg = $drow['numrows'];

    $stmtQuery = $conn->query("SELECT * FROM direct_message WHERE user_id=$id || user_id=0 && status<2 order by 1 desc Limit 4");
    if ($stmtQuery->rowCount()) {
       $dmrow = $stmtQuery->fetchAll(PDO::FETCH_OBJ);
    }
?>
<div class="topbar">            
    <!-- Navbar -->
    <nav class="navbar-custom">    
        <ul class="list-unstyled topbar-nav float-right mb-0">  
            <li class="dropdown hide-phone">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i data-feather="search" class="topbar-icon"></i>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right dropdown-lg p-0">
                    <!-- Top Search Bar -->
                    <div class="app-search-topbar">
                        <form action="#" method="get">
                            <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text...">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </li>                      

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i data-feather="bell" class="align-self-center topbar-icon"></i>
                    <?php if ($no_of_msg > 0) {
                        echo "<span class='badge badge-danger badge-pill noti-icon-badge'>".$no_of_msg."</span>";
                    }else{echo "";} ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">
                    <?php
                    if($no_of_msg > 0){ ?>

                    <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Notifications <span class="badge badge-primary badge-pill"><?= $no_of_msg; ?></span>
                    </h6> 

                    <div class="notification-menu" data-simplebar>
                        <!-- item-->
                        <?php
                          foreach ($dmrow as $dm) : ?>

                            <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage" class="dropdown-item py-3">
                                <div class="media">
                                    
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark"><?= $dm->subject; ?></h6>
                                        <?php if ($dm->status==0) {
                                            echo "<strong>";
                                        } ?>
                                        <small class="text-muted mb-0"><?= substrwords($dm->message, 50); ?></small>
                                        <?php if ($dm->status==0) {
                                            echo "</strong>";
                                        } ?>
                                    </div>
                                    
                                    <!--end media-body-->
                                </div><!--end media-->
                            </a>


                        <?php
                          endforeach;
                        ?>
                        <!--end-item-->
                    </div>
                    <!-- All-->
                    <a href="messages" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                    
                    <?php 
                      }else{
                      echo "
                            <h6 class='dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center'>
                                No Notifications Yet
                            </h6>
                            ";
                      }

                    ?>
                
                    
                    
                </div>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1 nav-user-name hidden-sm"><?php echo $row0["full_name"] ?></span>
                    <img src="../admin/images/<?php if(!empty($row0["photo"])){ echo $row0["photo"]; }else{echo "profile.jpg"; } ?>" alt="profile-user" class="rounded-circle thumb-xs" />                                 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                    <a class="dropdown-item" href="profile-edit"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="logout_action"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a>
                </div>
            </li>
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">                        
            <li>
                <button class="nav-link button-menu-mobile">
                    <i data-feather="menu" class="align-self-center topbar-icon"></i>
                </button>
            </li>                          
        </ul>
    </nav>
    <!-- end navbar-->
</div>