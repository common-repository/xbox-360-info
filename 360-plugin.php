<?php
/*
Plugin Name: Xbox 360 information plugin
Plugin URI: http://www.irving-swift.com
Description: A Xbox 360 wordpress plugin
Version: 1.1
Author: James Irving-Swift
Author URI: http://www.irving-swift.com
License: GPL
*/

include_once('lib/config.php');
include_once('lib/setup.php');

/* Runs when plugin is activated */
register_activation_hook(__FILE__, array('Xboxi_setup','install') ); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, array('Xboxi_setup','remove') );

class Xboxi extends Xboxi_config{

    function __constuct(){
        if ( is_admin() ){
            /* Call the html code */
            add_action('admin_menu', array (&$this , 'admin_menu') );
        }

        add_action('init','xboxinfo');
    }

    function admin_menu() {
        add_options_page(
                'Xbox info',
                'Xbox info',
                'administrator',
                'xbox-info',
                array(&$this,'options_html'));
    }
    
    function options_html() {
    ?>
    <div>
        <h2>Xboxinfo Options</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <table width="510">
                <tr valign="top">
                <th width="92" scope="row">Gamertag: </th>
                <td width="406">
                <input name="xboxinfo_data" type="text" id="xboxinfo_data"
                value="<?php echo get_option('xboxinfo_data'); ?>" />
                (ex. Major Nelson)</td>
                </tr>
            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="xboxinfo_data" />

            <p>
            <input type="submit" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>
    </div>
    <?php
    }

    function getAvatarImageSrc(){
        return $this->avatarUrl().get_option('xboxinfo_data')."/avatar-body.png";
    }
    
    function getAvatarImage(){
        return "<img src=\"".$this->getAvatarImageSrc()."/avatar-body.png\"/>";
    }
}