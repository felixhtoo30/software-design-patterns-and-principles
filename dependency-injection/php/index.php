<?php
    interface MessageService {
        public function sendMessage($message);
    }

    class SMSMessageService implements MessageService {
        public function sendMessage($message) {
            // Write a logic to send sms
            echo "Sending SMS: " . $message . PHP_EOL;
        }
    }

    class EmailMessageService implements MessageService {
        public function sendMessage($message) {
            // Write a logic to send sms
            echo "Sending Email: " . $message . PHP_EOL;
        }
    }

    class NotificationService {
        private $messageService;

        /**
         * MessageService is injected to NotificationService
         */
        public function __construct(MessageService $messageService) {
            
            $this->messageService = $messageService;
        }

        public function sendNotification($message) {
            // Use the injected message service to send the notification
            $this->messageService->sendMessage($message);
        }
    }

    $emailService = new EmailMessageService;

    $notificationService = new NotificationService($emailService);

    $notificationService->sendNotification("Hello World!");