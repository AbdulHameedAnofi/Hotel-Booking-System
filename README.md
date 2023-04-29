public function pay(Request $request, Payment $payment)
    {   
        DB::beginTransaction();
        try {
            $payment->setPayee(auth()->user()->name)
                ->setAmount($request->amount)
                ->setDescription('A demo payment testing using stripe!!!')
                ->setConfig()
                ->charge();
        
            // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            // Stripe\Charge::create ([
            //         "amount" => $request->amount,
            //         "currency" => "usd",
            //         "source" => $request->token,
            //         "description" => "Test payment" 
            // ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Payment failed oneCheckout:: ' . $e->getMessage());
            return 'Payment error!';
        }

        DB::commit();
        return 'Payment process done!';
    }