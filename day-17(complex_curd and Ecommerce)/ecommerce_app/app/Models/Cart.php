<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];

    // Define a relationship method named 'products' in the Cart model.
public function products(){

    // Use the 'belongsTo' method to specify a "belongs to" relationship.
    return $this->belongsTo(Product::class, 'prod_id', 'id');

    /*
    Here's what each parameter does:

    1. 'Product::class': Specifies the related model, which is the Product model.

    2. 'prod_id': Specifies the foreign key in the Cart table that establishes the relationship.
       It indicates that the 'prod_id' column in the 'Cart' table corresponds to the 'id' column in the 'Product' table.

       This means that each row in the 'Cart' table has a 'prod_id' value that links to a specific 'id' value in the 'Product' table.

       In practical terms, it suggests that each cart item in your cart is associated with a specific product, and 'prod_id' is the key that links them together.

    This relationship definition allows you to easily access the associated product for a given cart item.

    For example, if you have a cart item object ($cartItem) and you want to retrieve the associated product, you can do so like this:

    $product = $cartItem->products;

    Laravel will automatically fetch the product associated with that cart item based on the 'prod_id' foreign key.
    */
}

}
