<?php

namespace App\Services\Mail;

use SendGrid\Mail\Mail;
use Illuminate\Support\Facades\Log;

class SendGridService
{
    public function __construct()
    {
        Log::debug(__CLASS__);
    }

    public function send($data)
    {
        try {

            $data = $this->validateData($data);

            $email = new Mail();
            $email->setFrom($data->from->email, $data->from->name);
            $email->setSubject($data->subject);
            $email->addTo($data->to->email, $data->to->name);

            foreach ($data->cc as $cc) {
                $email->addCc($cc->email, $cc->name);
            }

            foreach ($data->co as $co) {
                $email->addBcc($co->email, $co->name);
            }

            if (false == empty($data->replyTo->email)) {
                $email->setReplyTo($data->replyTo->email, $data->replyTo->name);
            }

            if (false == empty($data->html)) {
                $email->addContent('text/html', $data->html);
            }

            if (false == empty($data->plain)) {
                $email->addContent('text/plain', $data->plain);
            }

            if (false == empty($data->attach)) {
                $email->addAttachment($data->attach);
            }

            $sendGrid = new \SendGrid($data->apiKey);

            Log::debug('Payload: ' . json_encode($email));

            $response = $sendGrid->send($email);

            Log::debug('Status code: ' . $response->statusCode());

            //202 ok
            //401 error authentication

            if ($response->statusCode() != '202') {
                throw new \Exception('Não foi possível enviar o e-mail');
            }

            return true;

        } catch (\Exception $e) {

            Log::error(exception_details($e));

            return false;
        }
    }

    /**
     * Validate data send e-mail and populate correct
     * @param $data
     * @return Object
     * @throws \Exception
     */
    private function validateData($data)
    {
        if (false == is_object($data)) {
            throw new \Exception('Dados inválidos');
        }

        $data->apiKey = config('sendgrid.api.key');

        if (empty($data->apiKey)) {
            throw new \Exception('Chave de API SendGrid vazia');
        } elseif (false == is_object($data->from)) {
            throw new \Exception('Remetente inválido');
        } elseif (false == is_object($data->to)) {
            throw new \Exception('Destinatário inválido');
        } elseif (false == filter_var($data->from->email ?? null, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('E-mail do remetente inválido: ' . ($data->from->email ?? null));
        } elseif (false == filter_var($data->to->email ?? null, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('E-mail do destinatário inválido: ' . ($data->to->email ?? null));
        } elseif (empty($data->html) && empty($data->plain)) {
            throw new \Exception('Conteúdo vazio');
        } elseif (empty($data->subject)) {
            throw new \Exception('Assunto vazio');
        }

        $data->from->name = $data->from->name ?? null;
        $data->to->name = $data->to->name ?? null;
        $data->html = $data->html ?? null;
        $data->plain = $data->plain ?? null;
        $data->cc = $this->parseCopy($data->cc ?? null);
        $data->co = $this->parseCopy($data->co ?? null);
        $data->replyTo = $this->parseReplyTo($data->replyTo ?? null);
        $data->attach = $this->parseAttach($data->attach ?? null);

        return $data;
    }

    /**
     * Validate and populate copy CC or CO e-mail
     * @param $data
     * @return array
     */
    private function parseCopy($data)
    {
        $data = (array)array_to_object($data);

        $copyAddresses = [];

        foreach ($data ?? [] as $item) {

            if (filter_var($item->email ?? null, FILTER_VALIDATE_EMAIL)) {

                $address = new \stdClass();
                $address->email = $item->email;
                $address->name = $item->name;

                $copyAddresses[] = $address;
            }
        }

        return $copyAddresses;
    }

    /**
     * Validate replyTo e-mail
     * @param $item
     * @return \stdClass
     */
    private function parseReplyTo($item)
    {
        if (is_object($item)) {

            $item->email = filter_var($item->email ?? null, FILTER_VALIDATE_EMAIL);
            $item->name = $item->name ?? null;

            return $item;
        }

        $item = new \stdClass;
        $item->email = null;
        $item->name = null;

        return $item;
    }

    /**
     * Validate attach e-mail
     * @param $item
     * @return array
     * @throws \Exception
     */
    private function parseAttach($item)
    {
        if (empty($item)) {
            return [];
        }

        if (false == is_object($item)) {
            throw new \Exception('Conteúdo do anexo inválido');
        } elseif (empty($item->content)) {
            throw new \Exception('Conteúdo do anexo vazio');
        } elseif (empty($item->type)) {
            throw new \Exception('Tipo de anexo inválido');
        } elseif (empty($item->filename)) {
            throw new \Exception('Nome do anexo inválido');
        } elseif (empty($item->disposition)) {
            throw new \Exception('Modo de anexo inválido');
        } elseif ($item->disposition == 'inline' && empty($item->contentId)) {
            throw new \Exception('Identificador do anexo inválido');
        }

        return [
            0 => $item->content,
            1 => $item->type,
            2 => $item->filename,
            3 => $item->disposition,
            4 => $item->contentId ?? null,
        ];
    }
}