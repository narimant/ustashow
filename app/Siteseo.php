<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siteseo extends Model
{
    protected $guarded=[];


    public function language()
    {
       if($this->lang=='en')
       {
           return 'English';
       }elseif($this->lang=='fa')
       {
           return 'Persian';
       }
       elseif($this->lang=='tr')
       {
           return 'Turkish';
       }
    }
}
