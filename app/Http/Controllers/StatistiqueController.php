<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Spent;
use Carbon\Carbon;
use Datetime;

class StatistiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // get total spent group by month and year
        $spents = Spent::orderBy('spentDate', 'ASC')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->spentDate)->format('m-y');
            })
            ->map(function ($row) {
                return $row->sum('total');
            });


        // get total bill group by month and year
        $bills = Bill::orderBy('created_at', 'ASC')
            ->with('billItems')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m-y');
            })
            ->map(function ($billsInMonth) {
                $value = 0;
                foreach ($billsInMonth as $bill) {
                    foreach ($bill->billItems as $billItem) {
                        $value += $billItem['price'];
                    }
                }

                return $value;
            });

        // generate month-year label
        $startingDate = '';
        if (Carbon::createFromFormat('m-y', array_keys($bills->toArray())[0])
            <= Carbon::createFromFormat('m-y', array_keys($spents->toArray())[0])) {
            $startingDate = array_keys($bills->toArray())[0];
        } else {
            $startingDate = array_keys($spents->toArray())[0];
        }

        $labels = array();
        $begin = Carbon::createFromFormat('m-y', $startingDate);
        $end = new DateTime(Carbon::createFromFormat('m-y', date('m-y')));
        while ($begin <= $end) {
            $labels[] = $begin->format('m-y');
            $begin->modify('+1 month');
        }


        $retSpents = array();
        $retBills = array();
        $sumSpent = 0;
        $sumBill = 0;
        foreach ($labels as $index => $label) {
            if (array_key_exists($label, $spents->toarray())) {
                $sumSpent += $spents[$label];
            }
            $retSpents[] = $sumSpent;

            if (array_key_exists($label, $bills->toarray())) {
                $sumBill += $bills[$label];
            }
            $retBills[] = $sumBill;

        }

        return view('statistique.index')
            ->with('spents', $retSpents)
            ->with('bills', $retBills)
            ->with('labels', $labels);
    }
}

