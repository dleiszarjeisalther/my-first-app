<?php

require __DIR__ . '/../../vendor/autoload.php';

$app = require_once __DIR__ . '/../../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "1. Testing raw email sending via Mail facade...\n";
    Illuminate\Support\Facades\Mail::raw(
        'Independent Victory Audit raw email verification test sent at ' . date('Y-m-d H:i:s'),
        function ($message) {
            $message->to('dleiszarjeisaltherlagariza@gmail.com')
                    ->subject('Independent Victory Audit Verification Test');
        }
    );
    echo "RAW_MAIL_SENT_SUCCESSFULLY\n";

    echo "2. Testing Password Reset Notification via in-memory user...\n";
    $dummyUser = new class extends \App\Models\User {
        public function routeNotificationForMail() {
            return 'dleiszarjeisaltherlagariza@gmail.com';
        }
        public function getEmailForPasswordReset() {
            return 'dleiszarjeisaltherlagariza@gmail.com';
        }
    };
    $dummyUser->email = 'dleiszarjeisaltherlagariza@gmail.com';
    $dummyUser->notify(new \Illuminate\Auth\Notifications\ResetPassword('audit_test_token_12345'));
    echo "RESET_NOTIFICATION_SENT_SUCCESSFULLY\n";

} catch (\Throwable $e) {
    echo "TEST_FAILED: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
