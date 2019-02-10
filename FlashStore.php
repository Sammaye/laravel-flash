<?php

namespace sammaye\Flash;

use Illuminate\Support\Facades\Session;

class FlashStore
{

    private $messages;

    private $session;

    private $key = 'flash_store';

    public function __construct(Session $session)
    {
        $this->session  = $session;
        $this->messages = collect();

        if ($this->session::has($this->key)) {
            $this->messages = collect(
              $this->session::get(
                $this->key,
                []
              )
            );
        }
    }

    public function error($message, $dismissible = false)
    {
        $this->message('danger', $message, $dismissible);
    }

    public function success($message, $dismissible = false)
    {
        $this->message('success', $message, $dismissible);
    }

    public function warning($message, $dismissible = false)
    {
        $this->message('warning', $message, $dismissible);
    }

    public function info($message, $dismissible = false)
    {
        $this->message('info', $message, $dismissible);
    }

    public function message($type, $message, $dismissible = false)
    {
        $this->messages->push([$type, $message, $dismissible]);
        $this->session::put($this->key, $this->messages);
    }

    public function messages()
    {
        return $this->messages;
    }

    public function clear()
    {
        $this->messages = collect();
        $this->session::forget($this->key);
    }
}
