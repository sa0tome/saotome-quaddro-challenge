<?php

namespace App\Rules;

use App\Models\Booking;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;
use Spatie\Period\Period;
use Spatie\Period\Precision;

class Availability implements DataAwareRule, InvokableRule
{
    protected $data = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function setData($booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {   
        $requestedPeriod = Period::make($this->booking['start_date'], $this->booking['end_date'], Precision::MINUTE());

        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $existentPeriod = Period::make($booking->start_date, $booking->end_date, Precision::MINUTE());
            if ($requestedPeriod->overlapsWith($existentPeriod)){
                $fail("Agendamento não efetuado, pois conflita com: $booking->title - $booking->start_date a $booking->end_date");
            }
        }
    }
}
