<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    public static $message_man = 'Sehr geehrter Herr';

    public static $message_woman = 'Sehr geehrte Frau';

    public static $thx_message = 'Herzlichen Dank für Ihre Bestellung. Gerne liefern wir Ihnen die bestellten und bezahlten Artikel wie folgt:';

    public static $questions = 'Für weitere Auskünfte stehe ich Ihnen gerne zur Verfügung.';

    public static $piece = 'Stk. ';

    public static function currentDate(){
        $dt = Carbon::now();
        return $dt->formatLocalized('%d. %B. %Y');
    }

    public function projects(){
        return $this->belongsTo(Project::class);
    }







}
