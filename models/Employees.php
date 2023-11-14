<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $surname
 * @property string $email
 * @property string $title
 * @property string $date_of_birth
 * @property string $id_no
 * @property string $gender
 * @property string $nationality
 * @property string $ethnicity
 * @property string $home_county
 * @property string $postal_address
 * @property string $code
 * @property string $town
 * @property string $telephone_number
 * @property string $mobile_number
 * @property string $alternative_contact_person
 * @property string $contact_person_telephone
 * @property bool $disability
 * @property string|null $disability_details
 * @property string|null $disability_reg_number
 * @property string|null $disability_reg_date
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'surname', 'email', 'title', 'date_of_birth', 'id_no', 'gender', 'nationality', 'ethnicity', 'home_county', 'postal_address', 'code', 'town', 'telephone_number', 'mobile_number', 'alternative_contact_person', 'contact_person_telephone', 'disability'], 'required'],
            [['date_of_birth', 'disability_reg_date'], 'safe'],
            [['gender'], 'string'],
            [['disability'], 'boolean'],
            [['firstname', 'lastname', 'surname'], 'string', 'max' => 25],
            [['email', 'postal_address', 'disability_details'], 'string', 'max' => 255],
            [['title', 'nationality', 'ethnicity', 'home_county', 'town', 'alternative_contact_person'], 'string', 'max' => 50],
            [['id_no', 'telephone_number', 'mobile_number', 'contact_person_telephone', 'disability_reg_number'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 10],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'surname' => 'Surname',
            'email' => 'Email',
            'title' => 'Title',
            'date_of_birth' => 'Date Of Birth',
            'id_no' => 'Id No',
            'gender' => 'Gender',
            'nationality' => 'Nationality',
            'ethnicity' => 'Ethnicity',
            'home_county' => 'Home County',
            'postal_address' => 'Postal Address',
            'code' => 'Code',
            'town' => 'Town',
            'telephone_number' => 'Telephone Number',
            'mobile_number' => 'Mobile Number',
            'alternative_contact_person' => 'Alternative Contact Person',
            'contact_person_telephone' => 'Contact Person Telephone',
            'disability' => 'Disability',
            'disability_details' => 'Disability Details',
            'disability_reg_number' => 'Disability Reg Number',
            'disability_reg_date' => 'Disability Reg Date',
        ];
    }
}
