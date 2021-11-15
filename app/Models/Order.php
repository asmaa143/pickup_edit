<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $address_id
 * @property int $Driver_id
 * @property integer $Customer_id
 * @property int $Voucher_id
 * @property int $Product_price
 * @property int $Driver_price
 * @property int $Final_price
 * @property string $Payment_method
 * @property string $created_at
 * @property string $updated_at
 * @property string $Status
 * @property CustomerAddress $customerAddress
 * @property Customer $customer
 * @property Driver $driver
 * @property OrderHasProduct[] $orderHasProducts
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * @var array
     */
    protected $fillable = ['address_id', 'driver_id', 'customer_id', 'voucher_id', 'product_price', 
    'driver_price', 'final_price', 'payment_method', 'created_at', 'updated_at', 'status','store_id',
    'date','type','serial_number','branch_id','customer_name','customer_phone','address_details'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerAddress()
    {
        return $this->belongsTo('App\Models\CustomerAddress', 'address_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\OrderHasProduct','order_id');
    }
}
