<?php
/**
 * User: lnn
 * Date: 2018/1/22 0022
 * Time: 09:38
 */

namespace App\Model;

use App\Model;

class Admin extends Model
{
    // protected $table = 'admin';

    protected $primaryKey = 'uid';

    public function hasOneAdminNode()
    {
        return $this->hasOne('App\Model\AdminNode', 'admin_id', 'uid');
    }


}