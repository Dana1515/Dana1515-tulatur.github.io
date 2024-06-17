<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Event extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = ['id','image', 'title', 'description', 'price', 'dates_begin', 'dates_end', 'more'];
   

    protected $allowedFilters=[
        'title'
       
    ];
 


}
