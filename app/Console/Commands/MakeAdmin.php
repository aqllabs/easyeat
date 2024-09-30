<?php

namespace App\Console\Commands;

use App\Models\User;
use Filament\Commands\MakeUserCommand;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class MakeAdmin extends MakeUserCommand
{
    protected $signature = 'make:admin
                            {--name= : The name of the user}
                            {--email= : A valid and unique email address}
                            {--password= : The password for the user (min. 8 characters)}';

    /**
     * Returns user data.
     */
    protected function getUserData(): array
    {
        return [
            'name' => $this->options['name'] ?? text(
                label: 'Name',
                required: true,
            ),

            'email' => $this->options['email'] ?? text(
                label: 'Email address',
                required: true,
                validate: fn (string $email): ?string => match (true) {
                    ! filter_var($email, FILTER_VALIDATE_EMAIL) => 'The email address must be valid.',
                    User::where('email', $email)->exists() => 'A user with this email address already exists',
                    default => null,
                },
            ),

            'password' => Hash::make($this->options['password'] ?? password(
                label: 'Password',
                required: true,
            )),
        ];
    }

    /**
     * Create admin user and assign admin role
     */
    protected function createUser(): Authenticatable
    {
        $user = $this->getUserModel()::create($this->getUserData());

        $role = Role::firstOrCreate(['name' => 'admin']);
        $user->assignRole($role);

        return $user;
    }

    public function handle(): int
    {
        parent::handle();

        return static::SUCCESS;
    }
}
