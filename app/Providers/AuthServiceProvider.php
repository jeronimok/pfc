<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        
        $gate->define('admin',function($user){
            if (auth()->check()){
                return $user->role == 'admin';
            }
            else {
                return false;
            }
        });

        $gate->define('admin_action',function($user, $admin_id){
            if (auth()->check()){
                return $user->id == $admin_id or $user->role == 'admin';
            }
            else {
                return false;
            }
        });

        $gate->define('edit_proposal',function($user, $proposal){
            if (auth()->check()){
                return ($user->id == $proposal->user_id) or ($user->id == $proposal->action->admin_id) or ($user->role == 'admin');
            }
            else {
                return false;
            }
        });

        $gate->define('edit_comment',function($user, $comment){
            if (auth()->check()){
                return ($user->id == $comment->user_id) or ($user->id == $comment->proposal->action->admin_id) or ($user->role == 'admin');
            }
            else {
                return false;
            }
        });

        $gate->define('vote',function($user, $poll_id){
            if (auth()->check()){
                return !in_array($poll_id, $user->polls());
            }
            else {
                return false;
            }
        });

        $gate->define('rate',function($user, $work_id){
            if (auth()->check()){
                return !in_array($work_id, $user->ratedWorks());
            }
            else {
                return false;
            }
        });

    }
}
