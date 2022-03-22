<?php
declare(strict_types=1);

namespace App\Date;

class Month 
{
    public $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    private $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    private $month;

    private $year;
    
    /**
     * Month constructor.
     * @param int $month The month between 1 and 12
     * @param int $year The year
     * @throws \Exception
     */
    public function __construct(?int $month  = null, ?int $year = null)
    {
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('y'));
        }
        $month = $month % 12;
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Returns the first day of the month
     * @return \DateTime
     */
    public function getStartingDay(): \DateTime {

        return new \DateTime("{$this->year}-{$this->month} -1");
    }

    /**
     * Return the month in any letter (ex: March 2022)
     * @return string
     */
    public function toString(): string {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    public function getWeeks(): int {
        $start = $this->getStartingDay();

        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return
    }
    
}

