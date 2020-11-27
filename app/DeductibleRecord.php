<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DeductibleRecord extends Model
{
	protected $guarded = [];

	public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function deductible() {
        return $this->belongsTo(Deductible::class);
    }
}
