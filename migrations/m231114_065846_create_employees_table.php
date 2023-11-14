<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 */
class m231114_065846_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(25)->notNull(),
            'lastname' => $this->string(25)->notNull(),
            'surname' => $this->string(25)->notNull(),
            'email' => $this->string()->unique()->notNull(),
            'title' => $this->string(50)->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'id_no' => $this->string(20)->notNull(),
            'gender' => $this->string(10)->notNull(),
            'nationality' => $this->string(50)->notNull(),
            'ethnicity' => $this->string(50)->notNull(),
            'home_county' => $this->string(50)->notNull(),
            'postal_address' => $this->string()->notNull(),
            'code' => $this->string(10)->notNull(),
            'town' => $this->string(50)->notNull(),
            'telephone_number' => $this->string(20)->notNull(),
            'mobile_number' => $this->string(20)->notNull(),
            'alternative_contact_person' => $this->string(50)->notNull(),
            'contact_person_telephone' => $this->string(20)->notNull(),
            'disability' => $this->boolean()->notNull(),
            'disability_details' => $this->string(),
            'disability_reg_number' => $this->string(20),
            'disability_reg_date' => $this->date(),
        ]);

    
        $this->alterColumn('{{%employees}}', 'gender', "ENUM('Male', 'Female') NOT NULL");
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
    }
}
