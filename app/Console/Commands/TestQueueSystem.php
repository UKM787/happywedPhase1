<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Host\Invitation;
use App\Models\User;
use App\Jobs\SendNotificationJob;

class TestQueueSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:queue-system {invitation_id?} {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the automatic queue system for SMS, Email, and WhatsApp';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🚀 Testing Queue System for SMS, Email, WhatsApp...');
        
        // Get invitation ID from argument or use first available
        $invitationId = $this->argument('invitation_id') ?? Invitation::first()?->id;
        $userId = $this->argument('user_id') ?? User::first()?->id;
        
        if (!$invitationId) {
            $this->error('❌ No invitations found in database');
            return 1;
        }
        
        if (!$userId) {
            $this->error('❌ No users found in database');
            return 1;
        }
        
        $invitation = Invitation::find($invitationId);
        $user = User::find($userId);
        
        if (!$invitation || !$user) {
            $this->error('❌ Invalid invitation or user ID');
            return 1;
        }
        
        $this->info("📧 Testing with:");
        $this->info("   Invitation: {$invitation->brideName} & {$invitation->groomName}");
        $this->info("   User: {$user->name} ({$user->email})");
        $this->info("   Mobile: {$user->mobile}");
        
        // Create a collection with single user for testing
        $guestlist = collect([$user]);
        
        // Dispatch the job (same as your controller does)
        $notificationClass = 'App\Notifications\Host\InvitationNotifications';
        
        $this->info('📤 Dispatching notification job to queue...');
        dispatch(new SendNotificationJob($guestlist, $invitation, $notificationClass, 'test-message'));
        
        $this->info('✅ Job dispatched successfully!');
        $this->info('⏰ The job will be processed automatically by your cron job within 1 minute');
        $this->info('📊 Check queue status with: php artisan queue:work --stop-when-empty');
        $this->info('📝 Check logs at: storage/logs/laravel.log');
        
        return 0;
    }
}
