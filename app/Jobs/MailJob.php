<?php

namespace App\Jobs;

use App\Services\Mail\SendGridService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * MailJob constructor.
     *
     * @param $data [
     *       'from' => ['email' => 'email@remetente.net','name' => 'Remetente Nome'],
     *       'to' => ['email' => 'email@destinatario.com','name' => 'Destinatário Nome'],
     *       'subject' => 'Teste sendgrid',
     *       'html'    => 'Teste <b>HTML</b>. Oi.',
     *       'plain'   => 'Teste Plain. Oi.',
     *       'cc'      => [['email' => 'email@cc.com', 'name' => 'Cc Nome'],[...],[...]],
     *       'co'      => [['email' => 'email@co.com', 'name' => 'Co Nome'],[...],[...]],
     *       'replyTo' => 'email@reply.to',
     *       'attach'  => [
     *           'content'       => 'base64_encode of file contents',
     *           'type'          => 'application/pdf',
     *           'filename'      => 'balance_001.pdf',
     *           'disposition'   => 'attachment',
     *           'contentId'     => 'identificador_quando_disposition_for_inline',
     *       ],
     *   ]
     * @return void
     */
    public function __construct($data)
    {
        $this->data = array_to_object($data);
        $this->onQueue('emails');
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $mail = new SendGridService();
        return $mail->send($this->data);
    }
}
