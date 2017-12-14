<?php
/**
 * Created by PhpStorm.
 * User: Zhaolian
 * Date: 14/12/2017
 * Time: 10:16 AM
 */

class EmailForm extends CFormModel
{
    public $email;

    function rules(){
        return array(
            array('email','email'),
        );
    }
}