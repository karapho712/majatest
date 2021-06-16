<?php

namespace Modules\Transaksi\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\User;

class Transaction extends Model
{
    // use Notifiable;
    protected $table = 'transaction';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_user', 'total'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    static function detail_produk($id)
    {
        $data = Barang::where("id", $id)->first();

        return $data;
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'id_transaction', 'id');
    }
}
