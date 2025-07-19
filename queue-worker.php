<?php
/**
 * Queue Worker Script for Hostinger
 * This script ensures queue workers are always running
 */

// Set the path to your Laravel application
$laravelPath = __DIR__;

// Function to check if queue worker is running
function isQueueWorkerRunning() {
    $output = shell_exec('ps aux | grep "queue:work" | grep -v grep');
    return !empty($output);
}

// Function to start queue worker
function startQueueWorker($laravelPath) {
    $command = "cd {$laravelPath} && php artisan queue:work database --sleep=3 --tries=3 --max-time=3600 --timeout=60 > storage/logs/queue-worker.log 2>&1 &";
    shell_exec($command);
    echo "Queue worker started at " . date('Y-m-d H:i:s') . "\n";
}

// Function to log status
function logStatus($message) {
    $logFile = __DIR__ . '/storage/logs/queue-monitor.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[{$timestamp}] {$message}\n", FILE_APPEND | LOCK_EX);
}

// Main execution
try {
    if (!isQueueWorkerRunning()) {
        startQueueWorker($laravelPath);
        logStatus("Queue worker was not running. Started new worker.");
    } else {
        logStatus("Queue worker is already running.");
    }
    
    // Process any pending jobs immediately
    shell_exec("cd {$laravelPath} && php artisan queue:work --stop-when-empty --timeout=30 > /dev/null 2>&1");
    
} catch (Exception $e) {
    logStatus("Error: " . $e->getMessage());
}
