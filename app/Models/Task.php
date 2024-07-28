<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\TaskDueSoon;
use Illuminate\Support\Facades\Notification;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'description', 'status', 'deadline'];

    protected static function booted()
    {
        static::saving(function ($task) {
            $dueSoon = now()->addDays(1)->startOfDay();
            if ($task->deadline && $task->deadline->isSameDay($dueSoon)) {
                Notification::route('mail', 'user@example.com') // Ganti dengan email pengguna
                    ->notify(new TaskDueSoon($task));
            }
        });
}
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
?>