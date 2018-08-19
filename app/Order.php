<?php

namespace App;

use App\Notifications\OrderSuccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    //
    use Notifiable;

    public function orderSuccessNotification($emailId)
    {
        $this->notify(new OrderSuccess($emailId));
    }
}
