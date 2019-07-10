<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

   protected $fillable = ['category_name', 'publication_status', 'category_description'];

}
