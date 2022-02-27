<a href="#" id="show-sidebar" class="btn btn-sm btn-dark">
            <i class="fa fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Instrumentals</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <?php 
                        $type = 1;
                        $conn = $pdo->open();
                        $stmt = $conn->prepare("SELECT * FROM customer WHERE type=:type");
                        $stmt->execute(['type'=>$type]);
                        $row = $stmt->fetch();
                        $pdo->close();
                    ?>
                    <div class="user-pic">
                        <img src="../images/avator.jpg" alt="img" class="img-responsive img-rounded">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo $row['first_name'] ?> <strong><?php echo $row['last_name'] ?></strong></span>
                        <span class="user-role">Adminstrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="home.php">Dashoboard 1   
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>E-commerce</span>
                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="products.php">Products</a>
                                    </li>
                                    <li><a href="category.php">Category</a></li>
                                    <li><a href="brands.php">Brands</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-gem"></i>
                                <span>Components</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="users.php">Users</a>
                                    </li>
                                    <li>
                                        <a href="sales.php">Sales</a>
                                    </li>
                                    <li>
                                        <a href="#">Feedback</a>
                                    </li>
                                    <li>
                                        <a href="#">Subscribers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <span class="badge-sonar"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Help</a>
                        <a href="#" class="dropdown-item">Setting</a>
                    </div>
                </div>
                <div>
                    <a href="../logout.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
                <div class="pinned-footer">
                    <a href="#">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </div>
            </div>
        </nav>