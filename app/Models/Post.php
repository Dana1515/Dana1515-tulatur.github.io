<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;


class Post extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Chartable;



    

    public $timestamps = false;
    protected $table = 'post';
    protected $fillable =['id','name', 'age', 'mark', 'review',];
}
