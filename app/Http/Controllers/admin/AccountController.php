<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Ledger;
use App\Loan;
use App\Member;
use App\Http\Requests\CreateLoanRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accs = Account::all();
        return view('admin.account.index',compact('accs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $members = [];
        foreach (Member::all() as $member) {
            $members += [$member->id => $member->name()];
        }
        $loans = Loan::all();
        $ltypes = [];
        foreach ($loans as $loan) {
            $ltypes += [$loan->id => $loan->name];
        }
        return view('admin.account.create', compact('ltypes','members','loans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLoanRequest $request)
    {
        //dd($request->loan_id);
        $acc = new Account();
        $acc->loan_id = $request->loan_id;
        $acc->member_id = $request->member_id;
        $acc->terms = $request->terms;
        $acc->amountGranted = $request->amount;
        $acc->comaker = $request->comaker;
        $acc->dateGranted = $request->dateGranted;

        $acc->dueDate = $acc->dateGranted;
        $acc->dueDate->addDays($acc->terms+1);

        $acc->balance = $acc->amountGranted;
        $acc->save();
        $insurance = 0.0;
        $cbu = 0.0;
        $sfee = 0.0;
        $advint = 0.0;
        switch($acc->loan_id-1){
            case 0:
                $today = \Carbon\Carbon::now();
                $mm = $today->month;
                if($mm==12||$mm==1){
                    $insurance = 0;//todo
                }
                else if($mm>=6&&$mm<=8){
                    $insurance = $acc->amountGranted*0.15;
                }
                $cbu = 500 * $acc->member->landArea;
                break;
            case 1:
                $cbu = 500;
                break;
            case 2:
            case 3:
            case 4:
            case 5:
                $advint = (($acc->amountGranted * $acc->loan->intRate * $acc->terms)/360)/2;
                break;
            case 6:
                //wala
            break;
        }

        $sfee = $acc->amountGranted * $acc->loan->sFee;
        //$total = $advint+$pcic+$insurance+$sfee+$sdeposit+$mortuary+$cbu+$balance+$penalty;
        $total = $advint+$insurance+$sfee+$cbu;
        $net = $acc->amountGranted-$total;

        $ledger = new Ledger();
        $ledger->account_id = $acc->id;
        $ledger->curDate = date('Y-m-d');
        $ledger->particulars = 'LOAN';
        $ledger->reference = $acc->id;
        $ledger->avaiment = $acc->amountGranted;
        $ledger->amountPayed = 0;
        $ledger->interestDue = 0.0;
        $ledger->penaltyDue = 0.0;
        $ledger->principal = 0.0;
        $ledger->interestPayed = 0.0;
        $ledger->penaltyPayed = 0.0;
        $ledger->balance = $acc->amountGranted;
        $acc->balance = $acc->amountGranted;//toodo

         
        $ledger->save();
        $inwords = $this->convert_number_to_words($net);



        return \PDF::loadHTML(view('reports.report1',compact('insurance','cbu','sfee','advint','total','net','acc','inwords')))
        ->stream('test.pdf'); 
        //flash()->success("Success!");
        //return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc = Account::find($id);
        $ledgers = Ledger::where('account_id',$acc->id)->get();
        return view('admin.account.show',compact('ledgers'),compact('acc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . $this->convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
}
