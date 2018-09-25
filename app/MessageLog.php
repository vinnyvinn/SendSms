<?php

namespace App;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Exportable;

class MessageLog extends Model implements FromCollection
{
        use Exportable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'contact','message','message_id','status'
    ];


    
    public function collection()
    {
        return MessageLog::all();
    }
}
