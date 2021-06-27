<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'serial_number',
        'description',
        'fixed',
        'picture_path',
        'purchase_date',
        'start_use_date',
        'purchase_price',
        'warranty_expiry_date',
        'degradation',
        'current_value',
        'location'
    ];
   
     /**
     * I use a one to one relationship to demonostrate
     * an asset can only have one asset assignment
     */
    public function asset_assignment(){
        return $this->hasOne('App\AssetAssignment');
    }

}
