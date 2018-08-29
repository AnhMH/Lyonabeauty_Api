<?php

use Fuel\Core\DB;
use Lib\Util;

/**
 * Any query in Model Company.
 *
 * @package Model
 * @version 1.0
 * @author AnhMH
 * @copyright Oceanize INC
 */
class Model_Company extends Model_Abstract {

    protected static $_properties = array(
        'id',
        'name',
        'logo',
        'address',
        'tel',
        'seo_image',
        'seo_description',
        'seo_keyword',
        'facebook',
        'twitter',
        'instagram',
        'google_plus',
        'youtube',
        'email',
        'created',
        'updated'
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );
    
    protected static $_table_name = 'companies';
    
    /**
     * Add update info.
     *
     * @author AnhMH
     * @param array $param Input data.
     * @return array|bool Returns the array or the boolean.
     */
    public static function add_update($param)
    {
        // Init
        $self = array();
        
        // Get company info
        $self = self::find('first');
        if (empty($self)) {
            $self = new self;
        }
        
        // Upload image
        if (!empty($_FILES)) {
            $uploadResult = \Lib\Util::uploadImage(); 
            if ($uploadResult['status'] != 200) {
                self::setError($uploadResult['error']);
                return false;
            }
            $param['logo'] = !empty($uploadResult['body']['logo']) ? $uploadResult['body']['logo'] : '';
            $param['seo_image'] = !empty($uploadResult['body']['seo_image']) ? $uploadResult['body']['seo_image'] : '';
        }
        
        // Set data
        if (!empty($param['name'])) {
            $self->set('name', $param['name']);
        }
        if (!empty($param['logo'])) {
            $self->set('logo', $param['logo']);
        }
        if (!empty($param['address'])) {
            $self->set('address', $param['address']);
        }
        if (!empty($param['tel'])) {
            $self->set('tel', $param['tel']);
        }
        if (!empty($param['seo_image'])) {
            $self->set('seo_image', $param['seo_image']);
        }
        if (!empty($param['seo_description'])) {
            $self->set('seo_description', $param['seo_description']);
        }
        if (!empty($param['seo_keyword'])) {
            $self->set('seo_keyword', $param['seo_keyword']);
        }
        if (!empty($param['facebook'])) {
            $self->set('facebook', $param['facebook']);
        }
        if (!empty($param['twitter'])) {
            $self->set('twitter', $param['twitter']);
        }
        if (!empty($param['instagram'])) {
            $self->set('instagram', $param['instagram']);
        }
        if (!empty($param['google_plus'])) {
            $self->set('google_plus', $param['google_plus']);
        }
        if (!empty($param['youtube'])) {
            $self->set('youtube', $param['youtube']);
        }
        if (!empty($param['email'])) {
            $self->set('email', $param['email']);
        }
        
        // Save data
        if ($self->save()) {
            if (empty($self->id)) {
                $self->id = self::cached_object($self)->_original['id'];
            }
            return $self->id;
        }
        return false;
    }
    
    /**
     * Get detail
     *
     * @author AnhMH
     * @param array $param Input data
     * @return array|bool
     */
    public static function get_detail($param)
    {
        
        $data = self::find('first');
        
        return $data;
    }
}
