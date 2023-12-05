<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['calculation', 'result'];

    public function getHistory(): Collection
    {
        return History::all();
    }

    /**
     * Create a new history record.
     *
     * @param string $calculation The calculation expression.
     * @param string $result The result of the calculation.
     * @return History The newly created history model instance.
     */
    public static function createRecord(string $calculation, string $result): History
    {
        return self::create([
            'calculation' => $calculation,
            'result' => $result,
        ]);
    }
}
