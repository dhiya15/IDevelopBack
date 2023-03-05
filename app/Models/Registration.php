<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        "full_name",
        "email",
        "phone_number",
        "category",
        "profession",
        "programing_level",
        "workshops",
        "is_accepted",
    ];

    public function acceptStudent($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/accept-student") . '/'. $this->id . '"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Accept Student
                </a>';
    }

    public function refuseStudent($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/refuse-student") . '/' .$this->id.'"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Refuse Student
                </a><br>';
    }

    public function isAccepted() {
        return ($this->is_accepted == 1) ? "Accepted" : "Refused";
    }
}
