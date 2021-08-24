<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'post_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['post_title', 'post_content'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    // -------------------------------
    // this exemple is helpful when i nedd to hash password so the user hash passwor befero insert
    // when i try to insert somting this method checkname will be executed 
    protected $beforeInsert = ['checkName'];

    public function checkName(array $data)
    {
        // data array have data key and post_title value
        $newTitle = $data['data']['post_title'] . 'Extra Features';
        // get the post title and giv it on the title who just created
        $data['data']['post_title'] = $newTitle;
        return $data;
    }

    // public function hashPassword(array $data)
    // {
    //     $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     return $data;
    // }
    // -----------------------------------------
}
