<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
    protected $fillable = [ 'title_ar', 'title_en',  'parent_id', 'is_menu','icon', 'order_no'];
    public $timestamps = false;

    public function SubModel(){
        return $this->hasMany(ProjectModel::class, 'parent_id')->orderBy('order_by', 'asc');
    }
}
