<?php

namespace App\Admin\Forms;

use App\Mail\ToAll;
use App\Models\User;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailToAll extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Send Mail to All';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(
                new ToAll(
                    $request->input('subject'),
                    $request->input('content'),
                    $user->name
                )
            );
        }

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('To')->default('All')->readonly()->withoutIcon();
        $this->text('subject')->rules('required');
        $this->textarea('content')->rules(['required', 'min:5']);
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'subject' => '',
            'content' => "",
        ];
    }
}
