<?php

class Migration_Install_migration extends CI_Migration {

    public function up()
    {
        // Drop table 'groups' if it exists
        $this->dbforge->drop_table('groups', TRUE);

        // Table structure for table 'groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('groups');

        // Dumping data for table 'groups'
        $data = array(
            array(
                'id' => '1',
                'name' => 'admin',
                'description' => 'Administrator'
            ),
            array(
                'id' => '2',
                'name' => 'members',
                'description' => 'General User'
            )
        );
        $this->db->insert_batch('groups', $data);


        // Drop table 'users' if it exists
        $this->dbforge->drop_table('users', TRUE);

        // Table structure for table 'users'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
            ),
            'salt' => array(
                'type' => 'VARCHAR',
                'constraint' => '40'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'activation_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'forgotten_password_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'forgotten_password_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'remember_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'created_on' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'last_login' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'company' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE
            )

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Dumping data for table 'users'
        $data = array(
            'id' => '1',
            'ip_address' => '127.0.0.1',
            'username' => 'administrator',
            'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
            'salt' => '',
            'email' => 'admin@admin.com',
            'activation_code' => '',
            'forgotten_password_code' => NULL,
            'created_on' => '1268889823',
            'last_login' => '1268889823',
            'active' => '1',
            'first_name' => 'Admin',
            'last_name' => 'istrator',
            'company' => 'ADMIN',
            'phone' => '0',
        );
        $this->db->insert('users', $data);


        // Drop table 'users_groups' if it exists
        $this->dbforge->drop_table('users_groups', TRUE);

        // Table structure for table 'users_groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'group_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups');

        // Dumping data for table 'users_groups'
        $data = array(
            array(
                'id' => '1',
                'user_id' => '1',
                'group_id' => '1',
            ),
            array(
                'id' => '2',
                'user_id' => '1',
                'group_id' => '2',
            )
        );
        $this->db->insert_batch('users_groups', $data);


        // Drop table 'login_attempts' if it exists
        $this->dbforge->drop_table('login_attempts', TRUE);

        // Table structure for table 'login_attempts'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('login_attempts');

        // Table structure for table 'menu_backend'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'menu_backend_parent'=>array(
                'type'=>'TINYINT',
                'constraint'=>'11',
                'null'=>TRUE
            ),
            'menu_backend_title'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_url_title'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_backend_status'=>array(
                'type'=>'TINYINT',
                'constraint'=>'1',
            ),
            'menu_backend_icon'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_backend_description'=>array(
                'type'=>'tinytext',
                'null'=>TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('menu_backend_parent', TRUE);
        $this->dbforge->create_table('menu_backend');

         // Table structure for table 'menu_frontend'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'menu_frontend_parent'=>array(
                'type'=>'TINYINT',
                'constraint'=>'11',
                'null'=>TRUE
            ),
            'menu_frontend_title'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_url_title'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_frontend_status'=>array(
                'type'=>'TINYINT',
                'constraint'=>'1',
            ),
            'menu_frontend_icon'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ),
            'menu_frontend_description'=>array(
                'type'=>'tinytext',
                'null'=>TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('menu_frontend_parent', TRUE);
        $this->dbforge->create_table('menu_frontend');

        // Table structure for table 'addons'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name_addons' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'technical_support' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null'=>TRUE
            ),
             'status_addons' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
            'description' => array(
                'type' => 'tinytext',
                'null'=>TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('addons');

    }

    public function down()
    {
        $this->dbforge->drop_table('users', TRUE);
        $this->dbforge->drop_table('groups', TRUE);
        $this->dbforge->drop_table('users_groups', TRUE);
        $this->dbforge->drop_table('login_attempts', TRUE);
        $this->dbforge->drop_table('menu_backend', TRUE);
        $this->dbforge->drop_table('menu_frontend', TRUE);
        $this->dbforge->drop_table('addons', TRUE);
    }


}