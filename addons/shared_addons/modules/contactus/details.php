<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * This is a Contact Us module for APN+ Network Organization Database
 *
 * @category   APN+ Network
 * @package    Contact us
 * @author     agus <www.gerekper.asia>
 * @copyright  2013-2014 Gerekper Inc
 * @license    -
 * @version    1.0.0
 * @link       -
 * @see        -
 * @since      File available since Release 1.0.0
 * @deprecated -
 */
 
 class Module_Contactus extends Module {
    
     public $version = '1.0.0';
     public $language_file = 'contactus/contactus';
    
    //----------------------------------------------------------------------//
    
    public function __construct()
    {
        parent::__construct();
        $this->contact          = 'apnplus_orgdb_contact_us';
        $this->contact_setting  = 'apnplus_orgdb_contact_us_setting';

        $this->lang->load($this->language_file);
    }
    
    //----------------------------------------------------------------------//
    
    public function info()
    {
        
        $info = array(
            'name' => array(
                'en' => 'APN+ Contact Us'
            ),
            'description' => array(
                'en' => 'Custom Contact Us. It needs apnplus_orgdb_country'
            ),
            'frontend'  =>  TRUE,
            'backend' => TRUE,  
            'sections'  => array(
                'contactus'     => array(
                    'name'      =>  'contactus:menu:comment',
                    'uri'       =>  'admin/contactus'
                ),
                'setting'     => array(
                    'name'      =>  'contactus:menu:setting',
                    'uri'       =>  'admin/contactus/setting'
                ),
            )
        );

        return $info;
    }

    //----------------------------------------------------------------------//

    public function admin_menu(&$menu)
    {
        $menu['lang:orgdb:menu:title']['lang:contactus:section:contactus']    = 'admin/contactus';
    }

    //----------------------------------------------------------------------//
    
    public function install()
    {
        //delete all tables contactus
        $_install_0 = $this->uninstall();

        //create new tables
        $_install_1 = $this->contactus_install_schema();

        //insert data tables
        $_install_2 = $this->contactus_insert_setting_data();
        $_install_3 = $this->contactus_insert_email_template();

        return ($_install_0  && $_install_1  && $_install_2  && $_install_3 == TRUE) ? TRUE : FALSE;
    }
    
    //----------------------------------------------------------------------//
    
    public function uninstall()
    {
        //remove existing email template from table
        $_uninstall_0 = $this->db->delete('email_templates', array('slug' => 'contact_us'));
        $_uninstall_1 = $this->dbforge->drop_table($this->contact);
        $_uninstall_2 = $this->dbforge->drop_table($this->contact_setting);
        return ($_uninstall_0 && $_uninstall_1 && $_uninstall_2 == TRUE) ? TRUE : FALSE;
    }

    public function upgrade($version)
    {
        $_upgrade01 = $this->db->update($this->db->dbprefix('modules'), array('version' => $version), array('slug' => 'contactus'));    
        return ($_upgrade01  == TRUE) ? TRUE : FALSE;
    }
    
    //----------------------------------------------------------------------//
    
    public function help() //TODO: Update
    {
        $help = "<h3>USAGE</h3>";
        $help .= "1. Make sure APN COUNTRY is installed. it need country tabel for option dropdown.<br />";
        $help .= "2. Change email destination on admin page.<br />";
        return $help;
    }

    //----------------------------------------------------------------------//
    
    public function contactus_install_schema()
    {
        $new_tables = array(
            'apnplus_orgdb_contact_us' => array(
                'id'                => array('type' => 'INT', 'constraint' => 9, 'auto_increment' => TRUE, 'primary' => true),
                'name'              => array('type' => 'VARCHAR', 'constraint' => 50),
                'company_name'      => array('type' => 'VARCHAR', 'constraint' => 50),
                'company_website'   => array('type' => 'VARCHAR', 'constraint' => 50),
                'email'             => array('type' => 'VARCHAR', 'constraint' => 100),
                'telephone'         => array('type' => 'VARCHAR', 'constraint' => 20),
                'country'           => array('type' => 'VARCHAR', 'constraint' => 100),
                'interested'        => array('type' => 'VARCHAR', 'constraint' => 100),
                'preferred'         => array('type' => 'VARCHAR', 'constraint' => 10),
                'comment'           => array('type' => 'TEXT'),
                'date'              => array('type' => 'DATETIME')
            ),
            'apnplus_orgdb_contact_us_setting' => array(
                'email' => array('type' => 'VARCHAR', 'constraint' => 100)
            )
        );
        return ($this->install_tables($new_tables) == TRUE) ? TRUE : FALSE;
    }

    //----------------------------------------------------------------------//

    public function contactus_insert_setting_data()
    {
        return $this->db->insert($this->contact_setting, array('email' => 'no-reply@testing.com'));
    }

    //----------------------------------------------------------------------//

    public function contactus_insert_email_template()
    {
        $new_templates = array(
            'slug'          => 'contact_us',
            'name'          => 'Contact Us Notification',
            'description'   => 'Template for the contact us form',
            'subject '      => '{{ settings:site_name }} :: {{ interested }}',
            'body'          => 'Name: {{ name}}<hr />Company Name: {{ company_name }}<hr />Company Website: {{ company_website}}<hr />Email: {{ email }}<hr />Telephone: {{ telephone }}<hr />Country: {{ country }}<hr />Interested in: {{ interested}}<hr />Preferred: {{ preferred }}<hr />{{ comment }}<hr />This message was sent via the contact us form on with the following details:<br />IP Address: {{ sender_ip }} OS {{ sender_os }} Agent {{ sender_agent }}',
            'lang'          => 'en',
            'is_default'    => 0,
            'module'        => 'pages',
        );
        return $this->db->insert('email_templates', $new_templates);
    }
}