<?php 
    $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['admin']]);
    $users = $stmt->fetch();

    function avatar($img){
        if(!$img){
            $avatar = 'default-avatar.jpg';
        } else {
            $avatar = $img;
        }
        
        return $avatar;
    }
?> 
	<body class="app ">
		<div id="spinner"></div>
		<div id="app" class="page">
			<div class="main-wrapper page-main" >
				<nav class="navbar navbar-expand-lg main-navbar">
					<a class="header-brand" href="index.php">
						<img src="../img/logo.png" class="header-brand-img" alt="  Asta-Admin logo">
					</a>
					<form class="form-inline mr-auto">
						<ul class="navbar-nav">
							<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-navicon"></i></a></li>
							<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none navsearch"><i class="ion ion-search"></i></a></li>
						</ul>

						<div class="form-inline mr-auto horizontal" id="headerMenuCollapse">
							<div class=" d-none d-lg-block">
								<ul class="nav">
                                    <li class="nav-item with-sub">
										<a class="nav-link mr-0" href="../" target="_blank">
											<i class="fa fa-eye"></i>
											<span> زيارة الموقع</span>
										</a> 
									</li>
								</ul>
						    </div>
						</div>
					</form>
 
					<ul class="navbar-nav navbar-right ">
					    <li class=""><a href="#" class=" "></a>
							<form class="form-inline mr-auto">
								<div class="search-element">
									<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
									<button class="btn btn-primary" type="submit"><i class="ion ion-search"></i></button>
								</div>
						    </form>
						</li>  
						<li class="dropdown dropdown-list-toggle">
							<a href="#" class="nav-link nav-link-lg full-screen-link">
								<i class="fa fa-expand"  id="fullscreen-button"></i>
							</a>
						</li> 
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
							<img src="img/avatar/<?php echo avatar($users['img']); ?>" alt="profile-user" class="rounded-circle w-32">
							<div class="d-sm-none d-lg-inline-block"><?php echo ucfirst(user($_SESSION['admin'],'full_name')); ?></div></a>
							<div class="dropdown-menu dropdown-menu-right">
								 
								<a href="admin-setting.php" class="dropdown-item has-icon">
									<i class="ion ion-gear-a"></i> Settings
								</a>
								<a href="logout.php" class="dropdown-item has-icon">
									<i class="ion-ios-redo"></i> Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>