<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    protected $table = 'hotels';

    public $timestamps = false;
    protected $fillable =['id','image', 'title', 'price', 'more'];

}
