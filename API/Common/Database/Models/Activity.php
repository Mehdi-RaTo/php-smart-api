<?php

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Activity extends Model
{
    use HasUuids;
    protected $table = "activities";
    protected $primaryKey = "GuidKey";
}
