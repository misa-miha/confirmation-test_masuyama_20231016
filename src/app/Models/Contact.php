<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'zip11',
        'addr11',
        'address2',
        'content'
    ];

    public function scopeNameSearch($query, $name)
    {
        if (!empty($name)) {
            $query->orWhere('last_name', 'LIKE', "%{$name}%")
            ->orWhere('first_name', 'LIKE', "%{$name}%")
            ->orWhereRaw('CONCAT(last_name, "", first_name) LIKE ? ', '%' . $name . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', 'like', '%' . $gender . '%');
        }
    }

    public function scopeFromDateSearch($query, $from_date)
    {
        if (!empty($from_date)) {
            $query->where('created_at', 'like', '%' . $from_date . '%');
        }
    }

    public function scopeToDateSearch($query, $to_date)
    {
        if (!empty($to_date)) {
            $query->whereDate('created_at', '<=', $to_date);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
    }




}
