<?php namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class VerifiedUsers implements Scope{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('email_verified_at','<>',null);
    }
}
