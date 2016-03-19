<?php


include_once('BootstrapLaddaButtons_LifeCycle.php');

class BootstrapLaddaButtons_Plugin extends BootstrapLaddaButtons_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Enter in some text', 'ladda bootstrap hybrid - theme independent')),
            'AmAwesome' => array(__('I like this awesome plugin', 'laddastrap'), 'false', 'true'),
            'CanDoSomething' => array(__('Which user role can do something', 'laddastrap'),
                                        'Administrator', 'Editor', 'Author', 'Contributor', 'Subscriber', 'Anyone')
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'Bootstrap 3 + Ladda Buttons';
    }

    protected function getMainPluginFileName() {
        return 'bootstrap-ladda.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }
    
    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37


        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        
        function load_laddastrap_styles(){
        //Enqeueu the Bootstrap 3 if not already
        wp_enqueue_style('bootstrap-css', plugins_url('/css/bootstrap.min.css', __FILE__));
        wp_enqueue_style('bootstrap-map', plugins_url('/css/bootstrap.min.css.map', __FILE__));
        //wp_enqueue_style('ladda-css', plugins_url('/css/ladda.css', __FILE__));
	//wp_enqueue_style('ladda-css', plugins_url('/css/demo.css', __FILE__));
 	wp_enqueue_style('ladda-css', plugins_url('/css/ladda.min.css', __FILE__));
        //wp_enqueue_style('prism-css', plugins_url('/css/prism.css', __FILE__));
         }
        add_action( 'wp_enqueue_scripts', 'load_laddastrap_styles' );
        
        function load_laddastrap_scripts(){
        //Enqeueu the Bootstrap 3 if not already
        //wp_enqueue_script('npm-js', plugins_url('/js/npm.js', __FILE__));
        wp_enqueue_script('bootstrap-js', plugins_url('/js/bootstrap.min.js', __FILE__));
        
        // Enqeue the ladda styles and script
        // Header

        // Footer
        wp_enqueue_script('spin-js', plugins_url('/js/spin.min.js', __FILE__),array('jquery'), null, true);
        wp_enqueue_script('ladda-js', plugins_url('/js/ladda.min.js', __FILE__),array('jquery'), null, true);
        wp_enqueue_script('ladda-init', plugins_url('/js/init.ladda.js', __FILE__),array('jquery'), null, true);
        }
        add_action( 'wp_enqueue_scripts', 'load_laddastrap_scripts' );
        
	function laddastrap_testfooter_function() {
    	echo '<p>This is inserted at the bottom</p>';
	}
	add_action('wp_footer', 'laddastrap_testfooter_function', 100);

        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39


        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41

    }


}