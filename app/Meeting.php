<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use Sortable;
    protected $table='meetings';
    protected $fillable=['host_id','user_id','meetingtitle','meetingdate','meetingtime'];
    public $sortable = ['id', 'meetingdate','meetingtime', 'created_at', 'updated_at'];

    public $timestamps=false;
    public function profiles()
    {
        return $this->belongsTo(ModelProfile::class);
    }
}
