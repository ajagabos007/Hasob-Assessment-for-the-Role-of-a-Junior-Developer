<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetAssignment extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_id',
        'assignment_date',
        'status',
        'is_due',
        'due_date',
        'assigned_user_id',
        'assigned_by',
    ];
     
    /**
     * I used a one to one relationship to demonstrate
     * that an asset assignment belongs to an asset
     */
    public function asset(){
        return $this->belongsTo('App\Asset');
    }
    /**
     * I used a one to many relationship to demonstrate
     * that an asset asignment belongs to a particular user
     */
    public function assigned_user()
    {
        return $this->belongsTo('App\User'); 
    }

}
