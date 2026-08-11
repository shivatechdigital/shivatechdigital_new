<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public JobApplication $application)
    {
    }

    public function build(): self
    {
        $job = $this->application->job;

        return $this->subject('Application Received: ' . ($job?->title ?? 'Job Opportunity'))
            ->view('emails.job-application-received', [
                'application' => $this->application,
                'job' => $job,
            ]);
    }
}
