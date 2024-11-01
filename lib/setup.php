<?php

class Xboxi_setup extends Xboxi_config{

    function install() {
        /* Creates new database field */
        add_option("xboxinfo_gamertag", 'Default', '', 'yes');
        add_option("xboxinfo_version", 'Default', parent::getVer(), 'yes');
    }

    function remove() {
        /* Deletes the database field */
        delete_option('xboxinfo_gamtertag');
        remove_option('xboxinfo_version');
    }

}