<?php

class erLhcoreClassMailconvValidator {

    public static function validateMatchRule($item) {

        $definition = array(
            'dep_id' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            ),
            'conditions' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'active' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'boolean'
            ),
            'mailbox_ids' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int', array('min_range' => 1), FILTER_REQUIRE_ARRAY
            ),
            'priority' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            ),
            'priority_rule' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            ),
            'from_mail' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'from_name' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'subject_contains' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            )
        );

        $form = new ezcInputForm( INPUT_POST, $definition );
        $Errors = array();

        if ( $form->hasValidData( 'dep_id' )) {
            $item->dep_id = $form->dep_id;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please choose a department!');
        }

        if ( $form->hasValidData( 'from_mail' )) {
            $item->from_mail = $form->from_mail;
        } else {
            $item->from_mail = '';
        }

        if ( $form->hasValidData( 'from_name' )) {
            $item->from_name = $form->from_name;
        } else {
            $item->from_name = '';
        }

        if ( $form->hasValidData( 'priority' )) {
            $item->priority = $form->priority;
        } else {
            $item->priority = 0;
        }

        if ( $form->hasValidData( 'priority_rule' )) {
            $item->priority_rule = $form->priority_rule;
        } else {
            $item->priority_rule = 0;
        }

        if ( $form->hasValidData( 'subject_contains' )) {
            $item->subject_contains = $form->subject_contains;
        } else {
            $item->subject_contains = '';
        }

        if ( $form->hasValidData( 'mailbox_ids' )) {
            $item->mailbox_ids = $form->mailbox_ids;
        } else {
            $item->mailbox_ids = [];
        }

        $item->mailbox_id = json_encode($item->mailbox_ids);

        if ( $form->hasValidData( 'active' ) && $form->active == true) {
            $item->active = 1;
        } else {
            $item->active = 0;
        }



        return $Errors;
    }

    public static function validateMailbox($item) {
        $definition = array(
            'mail' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'validate_email'
            ),
            'username' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'name' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'password' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'host' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'imap' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'signature' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'port' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            ),
            'active' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'boolean'
            ),
            'signature_under' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'boolean'
            ),
            'sync_interval' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            ),
        );


        $form = new ezcInputForm( INPUT_POST, $definition );
        $Errors = array();

        if ( $form->hasValidData( 'mail' ))
        {
            $item->mail = $form->mail;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter an e-mail!');
        }

        if ( $form->hasValidData( 'username' )) {
            $item->username = $form->username;
        } else {
            $item->username = '';
        }

        if ( $form->hasValidData( 'signature_under' ) && $form->signature_under == true) {
            $item->signature_under = 1;
        } else {
            $item->signature_under = 0;
        }

        if ( $form->hasValidData( 'name' )) {
            $item->name = $form->name;
        } else {
            $item->name = '';
        }

        if ( $form->hasValidData( 'imap' )) {
            $item->imap = $form->imap;
        } else {
            $item->imap = '';
        }

        if ( $form->hasValidData( 'signature' )) {
            $item->signature = $form->signature;
        } else {
            $item->signature = '';
        }

        if ( $form->hasValidData( 'sync_interval' )) {
            $item->sync_interval = $form->sync_interval;
        } else {
            $item->sync_interval = 60;
        }

        if ( $form->hasValidData( 'password' )) {
            $item->password = $form->password;
        } else {
            $item->password = '';
        }

        if ( $form->hasValidData( 'host' )) {
            $item->host = $form->host;
        } else {
            $item->host = '';
        }

        if ( $form->hasValidData( 'port' )) {
            $item->port = $form->port;
        } else {
            $item->port = '';
        }

        if ( $form->hasValidData( 'active' ) && $form->active == true) {
            $item->active = 1;
        } else {
            $item->active = 0;
        }

        return $Errors;
    }
    
    public static function validateResponseTemplate($item) {
        $definition = array(
            'name' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'template' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'template_plain' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'DepartmentID' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int',array('min_range' => 1),FILTER_REQUIRE_ARRAY
            ),
            'dep_id' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int'
            )
        );

        $form = new ezcInputForm( INPUT_POST, $definition );
        $Errors = array();

        if ( $form->hasValidData( 'name' ) && $form->name != '')
        {
            $item->name = $form->name;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter a name!');
        }

        if ( $form->hasValidData( 'template' )) {
            $item->template = $form->template;
        } else {
            $item->template = '';
        }
        
        if ( $form->hasValidData( 'template_plain' )) {
            $item->template_plain = $form->template_plain;
        } else {
            $item->template_plain = '';
        }

        if ( $form->hasValidData( 'dep_id' )) {
            $item->dep_id = $form->dep_id;
        } else {
            $item->dep_id = 0;
        }

        if (!$form->hasValidData( 'DepartmentID' )) {
            $item->dep_id = 0;
        } else {
            $item->dep_id = -1;
            $item->department_ids = $form->DepartmentID;
        }

        return $Errors;
    }

    public static function setSendParameters($mailbox, $phpmailer)
    {
        $phpmailer->IsSMTP();
        $phpmailer->Host = $mailbox->host;
        $phpmailer->Port = $mailbox->port;

        $phpmailer->From = $mailbox->mail;
        $phpmailer->FromName = $mailbox->name;

        if ($mailbox->username != '') {
            $phpmailer->Username = $mailbox->username;
            $phpmailer->Password = $mailbox->password;
            $phpmailer->SMTPAuth = true;
        } else {
            $phpmailer->From = '';
        }
    }

    public static function prepareMailContent($content, $mailReply) {

        // Parse links
        $matches = [];

        $string = '/href="' . str_replace('/','\/',erLhcoreClassDesign::baseurl('file/downloadfile')) . '([a-zA-Z0-9-\.-\/\_]+)"/';

        preg_match_all($string,$content,$matches);

        foreach ($matches[1] as $index => $file) {
            $paramsFile = explode('/',trim($file,'/'));
            $fileObj = erLhcoreClassModelChatFile::fetch($paramsFile[0]);
            if ($fileObj instanceof erLhcoreClassModelChatFile && $fileObj->security_hash == $paramsFile[1]) {
                $content = str_replace($matches[0][$index],'href="' . erLhcoreClassXMP::getBaseHost().  $_SERVER['HTTP_HOST'] . erLhcoreClassDesign::baseurldirect('file/downloadfile') . "/{$fileObj->id}/{$fileObj->security_hash}",$content);
            }
        }

        // Parse images
        $string = '/src="' . str_replace('/','\/',erLhcoreClassDesign::baseurl('file/downloadfile')) . '([a-zA-Z0-9-\.-\/\_]+)"/';

        preg_match_all($string,$content,$matches);

        foreach ($matches[1] as $index => $file) {
            $paramsFile = explode('/',trim($file,'/'));
            $fileObj = erLhcoreClassModelChatFile::fetch($paramsFile[0]);
            if ($fileObj instanceof erLhcoreClassModelChatFile && $fileObj->security_hash == $paramsFile[1]) {
                $cid = 'lhc-file-' . $fileObj->id . '-' . time();
                $mailReply->AddEmbeddedImage($fileObj->file_path_server, $cid, $fileObj->upload_name);
                $content = str_replace($matches[0][$index],'src="' . 'cid:' . $cid .'"', $content);
            }
        }

        return $content;
    }

    public static function sendReply($params, & $response, $mail, $user_id = 0) {

        $response['errors'] = [];

        if (!isset($params['content']) || empty($params['content'])) {
            $response['errors']['content'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Content is required!');
        }

        if (!isset($params['recipients']['reply']) || empty($params['recipients']['reply'])) {
            $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter at-least one recipient!');
        }

        foreach ($params['recipients']['reply'] as $recipient) {
            if (!isset($recipient['email']) || empty($recipient['email'])) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','To: Please enter a valid recipient e-mail!');
            } else if (!filter_var($recipient['email'], FILTER_VALIDATE_EMAIL)) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','To: Invalid e-mail recipient!');
            }
        }

        foreach ($params['recipients']['bcc'] as $recipient) {
            if (!isset($recipient['email']) || empty($recipient['email'])) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Bcc: Please enter a valid recipient e-mail!');
            } else if (!filter_var($recipient['email'], FILTER_VALIDATE_EMAIL)) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Bcc: Invalid e-mail recipient!');
            }
        }

        foreach ($params['recipients']['cc'] as $recipient) {
            if (!isset($recipient['email']) || empty($recipient['email'])) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Cc: Please enter a valid recipient e-mail!');
            } else if (!filter_var($recipient['email'], FILTER_VALIDATE_EMAIL)) {
                $response['errors']['reply'] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Cc: Invalid e-mail recipient!');
            }
        }

        if (empty($response['errors'])) {
            try {
                $mailReply = new PHPMailer(true);
                $mailReply->CharSet = "UTF-8";

                // If it's first reply append 'Re: ' to subject.
                if (isset($params['mode']) && $params['mode'] === 'forward') {
                    $mailReply->Subject = 'Fwd: ' . $mail->subject;
                } else {
                    $mailReply->Subject = ($mail->in_reply_to == '' ? 'Re: ' : '') . $mail->subject;
                }

                $params['content'] = self::prepareMailContent($params['content'], $mailReply);

                $mailReply->Body = $params['content'];
                $mailReply->AltBody = strip_tags(str_replace(['<br />','<br/>'],"\n",$params['content']));

                $mailReply->AddReplyTo($mail->mailbox->mail,(string)$mail->mailbox->name);

                self::setSendParameters($mail->mailbox, $mailReply);

                if ($mail->message_id != '') {
                    $mailReply->addCustomHeader('In-Reply-To', $mail->message_id);
                    $mailReply->addCustomHeader('References', $mail->message_id);
                }

                // Add operator who send a message
                // So once we fetch message we will know whom to assign it
                if ($user_id > 0) {
                    $mailReply->addCustomHeader('X-LHC-ID', $user_id);
                }

                // @todo add validation
                foreach ($params['recipients']['reply'] as $recipient) {
                    $mailReply->AddAddress( $recipient['email'],'' );
                }

                foreach ($params['recipients']['cc'] as $recipient) {
                    $mailReply->addCC( $recipient['email'],'' );
                }

                foreach ($params['recipients']['bcc'] as $recipient) {
                    $mailReply->addBCC( $recipient['email'],'' );
                }

                // Assign attatchements
                foreach ($params['attatchements'] as $attatchement) {
                    $fileObj = erLhcoreClassModelChatFile::fetch($attatchement['id']);
                    if ($fileObj instanceof erLhcoreClassModelChatFile) {
                        $mailReply->addAttachment($fileObj->file_path_server, $fileObj->upload_name);
                    }
                }

                $response['send'] = $mailReply->Send();

                // Now we can set appropriate attributes for the message itself.
                if ($mail->accept_time == 0) {
                    $mail->accept_time = $mail->ctime;
                }

                $mail->lr_time = time();
                $mail->response_type = erLhcoreClassModelMailconvMessage::RESPONSE_NORMAL;
                $mail->response_time = $mail->lr_time - $mail->accept_time;
                $mail->status = erLhcoreClassModelMailconvMessage::STATUS_RESPONDED;
                $mail->conv_duration = time() - $mail->ctime;
                $mail->user_id = $user_id; // Update user who replied to customer e-mail
                $mail->updateThis();

            } catch (Exception $e) {
                $response['send'] = false;
                $response['errors']['general'] = $e->getMessage();
            }
        } else {
            $response['send'] = false;
        }
    }

    public static function sendEmail($item, & $response, $user_id = 0) {
        try {
            $mailReply = new PHPMailer(true);
            $mailReply->CharSet = "UTF-8";
            $mailReply->Subject = $item->subject;

            self::setSendParameters($item->mailbox, $mailReply);

            if (!empty($item->to_data)) {
                $mailReply->AddReplyTo($item->to_data, (string)$item->reply_to_data);
            } else {
                $mailReply->AddReplyTo($item->mailbox->mail, (string)$item->mailbox->name);
            }

            $mailReply->AddAddress($item->from_address, $item->from_name);

            $item->body = self::prepareMailContent( $item->body, $mailReply);

            $mailReply->Body = $item->body;
            $mailReply->AltBody = strip_tags(str_replace(['<br />','<br/>'],"\n",$item->body));

            if ($user_id > 0) {
                $mailReply->addCustomHeader('X-LHC-ID', $user_id);
            }

            $response['send'] = $mailReply->Send();

        } catch (Exception $e) {
            $response['send'] = false;
            $response['errors']['general'] = $e->getMessage();
        }

        return $response;
    }

    public static function validateNewEmail(& $item){

        $definition = array(
            'subject' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'from_address' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'from_name' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'to_data' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'reply_to_data' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'body' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
            ),
            'mailbox_id' => new ezcInputFormDefinitionElement(
                ezcInputFormDefinitionElement::OPTIONAL, 'int', array('min_range' => 1)
            )
        );

        $form = new ezcInputForm( INPUT_POST, $definition );
        $Errors = array();

        if ( $form->hasValidData( 'subject' ) && $form->subject != '')
        {
            $item->subject = $form->subject;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter a subject!');
        }

        if ( $form->hasValidData( 'from_address' ) && $form->from_address != '') {
            $item->from_address = $form->from_address;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter recipient e-mail!');
        }

        if ( $form->hasValidData( 'from_name' )) {
            $item->from_name = $form->from_name;
        } else {
            $item->from_name = '';
        }

        // Reply e-mail
        if ( $form->hasValidData( 'to_data' )) {
            $item->to_data = $form->to_data;
        } else {
            $item->to_data = '';
        }

        // Reply name
        if ( $form->hasValidData( 'reply_to_data' )) {
            $item->reply_to_data = $form->reply_to_data;
        } else {
            $item->reply_to_data = '';
        }

        if ( $form->hasValidData( 'body' )) {
            $item->body = $form->body;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please enter e-mail body!');
        }

        if ( $form->hasValidData( 'mailbox_id' )) {
            $item->mailbox_id = $form->mailbox_id;
        } else {
            $Errors[] = erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconv','Please choose a mailbox!');
        }

        return $Errors;

    }
}

?>