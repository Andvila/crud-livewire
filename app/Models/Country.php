<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    public $timestamps = false;

    protected $fillable = ['continent_id', 'country_name', 'capital_city'];

    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id', 'id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('country_name', 'ilike', $term)
                ->orWhere('capital_city', 'ilike', $term);

        });
    }

}
