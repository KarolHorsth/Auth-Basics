<?php

namespace App\Models;

use CodeIgniter\Model;

class logsModel extends Model
{
  protected $table      = 'logs';
  protected $primaryKey = 'id';

  protected $allowedFields = ['key', 'userId', 'value'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}