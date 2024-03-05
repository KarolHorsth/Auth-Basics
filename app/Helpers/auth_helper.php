<?php

use App\Models\userModel;
use App\Models\logsModel;

function getUser($id)
{
    $userModel = new userModel();
    $user = $userModel->where('id', $id)->first();
    return $user;
}

function setLogger($key, $userId, $value)
{
    $logsModel = new logsModel();
    $logData['key'] = $key;
    $logData['userId'] = $userId;
    $logData['value'] = $value;
    $logsModel->insert($logData);
}