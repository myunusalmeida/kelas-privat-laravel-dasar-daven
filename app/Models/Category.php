<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // Include the HasFactory trait

    // protected $table = 'kategori'; // Specify the table name
    // protected $primaryKey = 'id_kategori'; // Specify the primary key column name

    // ABSEN
    protected $fillable = [
        'category_name',
        'slug',
        'image',
        'description',
        'status'
    ];
}

// $categories = "SELECT * FROM kategori ORDER BY id_kategori DESC";
// while($row = mysqli_fetch_array(mysqli_query)) {
//     //
// }
