<?php

namespace Modules\Transaksi\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\User;
use Modules\Barang\Entities\Barang;

class TransactionDetail extends Model
{
    // use Notifiable;
    protected $table = 'transaction_detail';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_transactiuon', 'id_barang', 'was_harga', 'jumlah'
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

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'id_transaction', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
