<?php
/*
Plugin Name: LocalGov59
Plugin URI: http://www.localgov59.in.th/
Description: Utility for LocalGov59 workshop เครื่องมือช่วยเหลือสำหรับโครงการฝึกอบรมเชิงปฏิบัติการ LocalGov59
Version: 1.0
Author: Diversition Co., Ltd.
Author URI: http://www.diversition.co.th
*/


function localgov59() {
	
}
add_action('init','localgov59');

function localgov59_admin_actions() {
	
	add_menu_page( 'การกู้คืนข้อมูล', 'กู้คืนข้อมูล', 'administrator', 'localgov59-restore', 'localgov59_restore_page', 'dashicons-backup', 75);
	//add_options_page( 'การกู้คืนข้อมูล', 'กู้คืนข้อมูล', 'administrator', 'localgov59-restore-options', 'localgov5_restore_options');
	
    
}
add_action('admin_menu', 'localgov59_admin_actions');

function localgov59_restore_page() {
	if(!empty($_POST)) {
		switch($_POST['action']) {
			case "restore_categories":
				$result = localgov59_restore_categories();
				break;
			case "restore_data": 
				$result = localgov59_restore_data();
				break;
			case "restore_sitemap":
				$result = localgov59_restore_sitemap();
				break;
			case "restore_all":
				$result = localgov59_restore_all();
				break;
		}
	}
?>
<div>
<h1>การกู้คืนข้อมูล</h1>

<?php
if(!empty($_POST)) {
	echo "<h2>" . $_POST['name'] . "เรียบร้อยแล้ว</h2>";
}
?>

<div class="localgov59-restore-item">
<span class="dashicons dashicons-admin-multisite localgov59-restore-icon"></span>
<form action="admin.php?page=localgov59-restore" method="post">
<input type="hidden" name="action" value="restore_categories">
<input type="submit" name="name" id="submit" class="button button-primary" value="กู้คืนหมวดหมู่ตั้งต้น" onclick="confirm('ข้อมูลปัจจุบันของคุณอาจหายไปและไม่สามารถนำกลับมาได้ คุณแน่ใจว่าต้องการกู้คืนหมวดหมู่ตั้งต้นทั้งหมดหรือไม่?')">
</form>
</div>

<div class="localgov59-restore-item">
<span class="dashicons dashicons-format-aside localgov59-restore-icon"></span>
<form action="admin.php?page=localgov59-restore" method="post">
<input type="hidden" name="action" value="restore_data">
<input type="submit" name="name" id="submit" class="button button-primary" value="กู้คืนเรื่องและหน้าตัวอย่างทั้งหมด" onclick="confirm('ข้อมูลปัจจุบันของคุณอาจหายไปและไม่สามารถนำกลับมาได้ คุณแน่ใจว่าต้องการกู้คืนเรื่องและหน้าตัวอย่างทั้งหมดหรือไม่?')">
</form>
</div>

<div class="localgov59-restore-item">
<span class="dashicons dashicons-networking localgov59-restore-icon"></span>
<form action="admin.php?page=localgov59-restore" method="post">
<input type="hidden" name="action" value="restore_sitemap">
<input type="submit" name="name" id="submit" class="button button-primary" value="กู้คืนแผนผังเว็บไซต์ตั้งต้น" onclick="confirm('ข้อมูลปัจจุบันของคุณอาจหายไปและไม่สามารถนำกลับมาได้ คุณแน่ใจว่าต้องการกู้คืนแผนผังเว็บไซต์ตั้งต้นทั้งหมดหรือไม่?')">
</form>
</div>

<div class="localgov59-restore-item">
<span class="dashicons dashicons-backup localgov59-restore-icon"></span>
<form action="admin.php?page=localgov59-restore" method="post">
<input type="hidden" name="action" value="restore_all">
<input type="submit" name="name" id="submit" class="button button-primary" value="กู้คืนค่าเริ่มต้นทั้งหมด" onclick="confirm('ข้อมูลปัจจุบันของคุณอาจหายไปและไม่สามารถนำกลับมาได้ คุณแน่ใจว่าต้องการกู้คืนค่าเริ่มต้นทั้งหมดหรือไม่?')">
</form>
</div>

</div>
<?php
}

function localgov59_restore_categories() {
	return ;
}

function localgov59_restore_data() {
	return ;
}

function localgov59_restore_sitemap() {
	return ;
}

function localgov59_restore_all() {
	return ;
}


// Additional: Remove 'Edit with Visual Composer' link

function vc_remove_frontend_links() {
    vc_disable_frontend();
}
add_action( 'vc_after_init', 'vc_remove_frontend_links' );


// Additional: Remove icon of 'Shortcode Menu' Plugin to minimize 

function divertheme_custom_backend_display() {
	wp_enqueue_style('admin-styles', plugins_url('css/admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'divertheme_custom_backend_display');

// Load language file

function divertheme_load_textdomain() {
	load_plugin_textdomain( 'divertheme', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'divertheme_load_textdomain' );
