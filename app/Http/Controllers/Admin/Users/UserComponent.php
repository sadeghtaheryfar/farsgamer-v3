<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\User;

use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;

class UserComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $name, $family, $username, $mobile, $email;
    public $userWallet = [];
    public $walletType, $walletAmount, $walletDescription;
    public $roles = [] ;

    public function mount()
    {
        $this->data['role'] = Role::whereNotIn('name', ['administrator', 'super_admin'])->latest()->get();
    }

    public function render()
    {
        $this->authorize('show_users');
        $users = User::latest()
            ->withCount('orders')
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.users.user-component', ['users' => $users])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'roles' => ['required', 'array'],
            'roles.*' => ['required', 'exists:roles,name'],
        ];
    }

    public function edit($id)
    {
        $this->authorize('edit_users');

        $this->setMode(self::MODE_UPDATE);
        $this->model = User::find($id);

        $this->name = $this->model->name;
        $this->family = $this->model->family;
        $this->username = $this->model->username;
        $this->email = $this->model->email;
        $this->mobile = $this->model->mobile;

        $this->userWallet = $this->model->walletTransactions()->where('confirmed', 1)->get();

        $this->roles = $this->model->roles()->pluck('name')->toArray();
    }

    public function update()
    {
        $this->authorize('edit_users');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('کاربر با موفقیت ویرایش شد');
    }

    private function saveInDatabase(User $user)
    {
        $user->syncRoles($this->roles);
    }

    public function resetInputs()
    {
        //
    }

    public function walletAction()
    {
        $this->validate(
            [
                'walletType' => ['required', 'in:deposit,withdraw'],
                'walletAmount' => ['required', 'integer', 'min:0', 'max:1000000'],
                'walletDescription' => ['required', 'string', 'max:250'],
            ]
        );

        if ($this->walletType == Transaction::TYPE_DEPOSIT) {
            $this->model->deposit($this->walletAmount , ['description'=> $this->walletDescription]);
        } else {
            try {
            $this->model->withdraw($this->walletAmount , ['description'=> $this->walletDescription]);
            } catch (BalanceIsEmpty | InsufficientFunds $exception){
                $this->addError('walletAmount', $exception->getMessage());
            }
        }

        $this->userWallet = $this->model->walletTransactions()->where('confirmed', 1)->get();

        $this->reset(['walletType', 'walletAmount', 'walletDescription']);
        $this->emitNotify('کیف پول کاربر با موفقیت ویرایش شد');
    }

    private function getWalletTransactions()
    {
        
    }
}