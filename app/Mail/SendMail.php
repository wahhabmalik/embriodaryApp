<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Investment;
use App\Transaction;
use App\AccountInformation;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data,$investment;
    public function __construct($data,$investment)
    {
        $this->data = $data;
        $this->investment = $investment;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $start = date("Y-m-d", strtotime($this->data['start']));
        $end = date("Y-m-d", strtotime($this->data['end'] ?? date("Y-m-d")));

        $accountInformation = AccountInformation::
                                where('fk_investment_id',$this->data['investment_id'])
                                ->whereDate('starting_trade_date','>=',$start)
                                ->whereDate('starting_trade_date','<=',$end)
                                ->get();

              $transactions = Transaction::
                                where('fk_investment_id',$this->data['investment_id'])
                                ->whereDate('transaction_date','>=',$start)
                                ->whereDate('transaction_date','<=',$end)
                                ->get();

        // dd($this->investment);

        return $this->from('ellipsistechs@gmail.com','FX Lifestyle')
                    ->subject($this->data['subject'] ?? 'FX Lifestyle Financial Status')
                    ->view($this->data['view'])
                    ->with('accountInformation',$accountInformation)
                    ->with('transactions',$transactions)
                    ->with('start',$start)
                    ->with('end',$end)
                    ->with('investment',$this->investment)
                    ->with('data',$this->data);
    }
}
