<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scraper extends Model
{
    use HasFactory;

    protected $table = 'scrapers';

    protected $fillable = ['Coronavirus_Cases','Deaths','Recovered'];
}
