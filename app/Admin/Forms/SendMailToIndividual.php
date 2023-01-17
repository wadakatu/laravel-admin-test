<?php

namespace App\Admin\Forms;

use App\Mail\ToAll;
use App\Models\User;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailToIndividual extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Send Mail to Individual';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        foreach ($request->input('to') as $email) {
            if (is_null($email)) {
                continue;
            }
            $user = User::query()->where('email', $email)->first();
            Mail::to($email)->send(new ToAll($request->input('subject'), $request->input('content'), $user->name));
        }
        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $users = User::all()->pluck('name', 'email');
        $this->multipleSelect('to')->options($users->toArray());
        $this->text('subject')->rules('required');
        $this->textarea('content')->rules(['required']);
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
