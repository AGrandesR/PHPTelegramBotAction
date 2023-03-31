<?php

namespace Agrandesr\CustomActions;

use Agrandesr\actions\ActionBuilder;
use Agrandesr\CustomActions\TelegramTool;
use Exception;

class TelegramBotAction extends ActionBuilder {
    protected string $envFlag;
    protected $chatId;

    protected string $message;
    protected mixed $parseMode=null;
    protected bool $disableWebPagePreview=false;
    protected bool $disableNotification=false;
    protected mixed $replyToMessageId=null;

    protected string $photo;
    protected mixed $caption=null;

    protected string $audio;
    protected mixed $interpret;
    protected mixed $title;

    public function execute() {
        $flag=(empty($this->envFlag))?'TELEGRAM_':$this->envFlag.'_TELEGRAM_';
        $telegramToken=$_ENV[$flag . 'TOKEN'];

        $telegramTool = new TelegramTool($telegramToken);
        $res=['success'=>0,'info'=>'Not loaded required data in Telegram Action'];

        if(!isset($this->chatId)) throw new Exception("ChatId is required in TelegramBotAction content", 123);

        if(isset($this->message)) $res = $telegramTool->sendMessage($this->chatId,$this->message,$this->parseMode,$this->disableWebPagePreview,$this->disableNotification,$this->replyToMessageId);        
        if($res['success']===0) throw new Exception($res['info'], 12);
        if(isset($this->photo)) $res = $telegramTool->sendPhoto($this->chatId,$this->photo,$this->caption);
        if($res['success']===0) throw new Exception($res['info'], 13);
        if(isset($this->audio)) $res = $telegramTool->sendAudio($this->chatId,$this->audio, $this->interpret, $this->title);
        if($res['success']===0) throw new Exception($res['info'], 14);

    }
}