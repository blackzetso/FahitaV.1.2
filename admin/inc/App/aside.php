
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
					    <div class="dropdown">
							<a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
								<img alt="image" src="img/avatar/<?php echo avatar($users['img']); ?>" class=" avatar-md rounded-circle">
								<span class="ml-2 d-lg-block">
									<span class="text-dark app-sidebar__user-name mt-5"><?php echo ucfirst(user($_SESSION['admin'],'full_name')); ?></span><br>
									<span class="text-muted app-sidebar__user-name text-sm"> الصلاحية : مسؤل </span>
								</span>
							</a>
						</div>
					</div>
					<ul class="side-menu">
						<li class="slide">
							<a class="side-menu__item" href="categories.php"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">إدارة الأقسام</span> </a>
						</li>
						<li>
							<a class="side-menu__item" href="products.php"><i class="side-menu__icon fe fe-tag"></i><span class="side-menu__label">المنتجات</span></a>
						</li>
                        <li>
							<a class="side-menu__item" href="units.php"><i class="side-menu__icon icon icon-handbag"></i><span class="side-menu__label">الوحدات</span></a>
						</li>
                         <li class="slide">
							<a class="side-menu__item" href="brands.php"><i class="side-menu__icon fe fe-shield"></i><span class="side-menu__label"> الماركات </span> </a>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">إدارة الطلبات</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="new-orders.php" class="slide-item"> طلبات جديده </a></li>
								<li><a href="pending.php" class="slide-item"> جاري توصيلها</a></li>
								<li><a href="done.php" class="slide-item">  تم تسليمها </a></li> 
                                <li><a href="canceled.php" class="slide-item"> مرتجع </a></li> 
							</ul>
						</li>
                        <li>
							<a class="side-menu__item" href="combined-invoice.php"><i class="side-menu__icon ti-pencil-alt"></i><span class="side-menu__label">فاتورة مجمعه</span></a>
						</li>
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label"> البنرات  </span> <i class="angle fa fa-angle-right"></i></a>
						    <ul class="slide-menu">
								<li><a href="slides.php" class="slide-item"> بنرات متحركه </a></li>
								<li><a href="top-ads.php" class="slide-item"> بنرات علوية</a></li>
								<li><a href="bottom-ads.php" class="slide-item"> بنرات سفلية </a></li>  
							</ul>
                        </li>
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label"> المستخدمين </span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="admins.php" class="slide-item"> المسؤولين </a></li>
								<li><a href="users.php" class="slide-item"> الأعضاء </a></li> 
							</ul>
						</li>
                        <li class="slide">
							<a class="side-menu__item" href="settings.php"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label"> الإعدادات  </span> </a>
						</li>
					    
                        
					</ul>
				</aside>
