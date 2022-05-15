<?php

namespace App\Jobs;

use App\Models\ActivationCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserActivationCodeUsedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private ActivationCode $activationCode;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ActivationCode $activationCode)
    {
        $this->onQueue("user_activation_code");
        $this->activationCode = $activationCode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->activationCode->update([
            "is_used"      =>  1
        ]);
    }

}
