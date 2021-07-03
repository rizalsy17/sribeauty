  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-swimming-pool"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Sribeauty</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- query menu menunya(admin boleh mengakses dua2 nya,user hanya bagian user)-->
<!--butuh $role_id untuk session auth.php sesuai diistu ngambil role_id-->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = 
//tampilkan id dan menu tabel user_menu,id=user_menu
                "SELECT `user_menu`.`id`, `menu`
/*gabungin 2 tabel user_menu ke user_access menu*/                
                FROM `user_menu` JOIN `user_access_menu`
 /* kunci primary key dan foreign key*/               
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
 /*sesuai dengan yg lagi login */                 
               WHERE `user_access_menu`.`role_id` = $role_id
  /*urutkan berdasarkan menu id, asc=terurut naik */             
            ORDER BY `user_access_menu`.`menu_id` ASC
               ";
   /* jalanin query ,panggil query*/            
             $menu = $this->db->query($queryMenu)->result_array();
            
?>
<!-- looping menu,foreach ambil nama menunya=$menu -->
<?php foreach ($menu as $m) : ?>
<div class="sidebar-heading">
  <!--ambil nama menunya=$menu-->
  <?= $m['menu']; ?>
</div>

<!--siapkan submenu sesuai menu,misal menu admin isinya dashboard,user isinya my profile-->
<!--looping lagi-->
<?php
// jadi query nya join lagi,tabel menu dan submenu ,tampilkan sub menu sesuai menu
//TAMPILKAN semua isi tabel sub menu hanya yang menu id nya sesui dengan tabel menu,jadi select semua
//from tabel user sub menu yg join ke tabel menu
//kunci foreign key=menu_id, primary=id
//where masukkan menu id nya sama dengan $m=id =$menuId = $m['id];
// and sub menu aktif(suatu saat mati)
//sudah querynya,tinggal masukin lagi kedalam result
//diatas sendiri panggil $menuId
$menuId = $m['id'];
$querySubMenu = "SELECT * 
                 FROM `user_sub_menu` JOIN `user_menu`
                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                 WHERE `user_sub_menu`.`menu_id` = $menuId
                 AND `user_sub_menu`.`is_active` = 1
                 ";
$subMenu = $this->db->query($querySubMenu)->result_array();
?>

<!--foreach lagi,foreach dalam foreach
didalammnya isinya sub_menu=icon,url dll-->

<?php foreach ($subMenu as $sm) : ?>
  <?php if ($title == $sm['title']) : ?>
  <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
<?php endif; ?>
  <a class="nav-link" href="<?= base_url($sm['url']); ?>">
    <i class="<?= $sm['icon']; ?>"></i>
    <span><?= $sm['title']; ?></span></a>
</li>
<?php endforeach; ?>

<hr class="sidebar-divider">

<?php endforeach; ?>

  <li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout') ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>      
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->