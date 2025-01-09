<?php

class User extends Model
{
    protected $table = "users";
    protected $hidden = ["Password"];
}
