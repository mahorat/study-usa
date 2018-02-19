<?php

namespace App;

use App\User;
use App\StudentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inbox extends Model
{
    protected $fillable = ['id', 'subject', 'message', 'sender', 'recipient', 'seen', 'show', 'trashed', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at'];

	public function messageSender()
	{
	    return $this->belongsTo("App\StudentData", 'sender');
	}

	public function messageRecipient()
	{
	    return $this->belongsTo("App\StudentData", 'recipient');
	}
}
