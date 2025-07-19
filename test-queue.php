<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Create a test job
$invitation = App\Models\Host\Invitation::first();
$user = App\Models\User::first();

if (!$invitation || !$user) {
    echo "No invitation or user found!\n";
    exit;
}

echo "Testing with: " . $invitation->brideName . " & " . $invitation->groomName . "\n";
echo "User: " . $user->name . "\n";

$guestlist = collect([$user]);
$notificationClass = 'App\Notifications\Host\InvitationNotifications';

// Dispatch job to queue
dispatch(new App\Jobs\SendNotificationJob($guestlist, $invitation, $notificationClass, 'auto-test'));

echo "✅ Job created and dispatched to queue!\n";
echo "⏰ Wait 1-2 minutes for automatic processing...\n";
