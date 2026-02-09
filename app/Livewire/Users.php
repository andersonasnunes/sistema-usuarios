<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.app')]
class Users extends Component
{
    public $name;
    public $email;
    public $password;
    public int $formKey = 0;

    // boolean 
    public bool $is_active = true;

    public $userId;
    public $isEdit = false;
    public $showForm = false;

    // Filtro: 'todos' | '1' | '0'
    public string $filterStatus = 'todos';

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }

    private function ensureAuthenticated(): void
    {
        if (!Auth::check()) {
            abort(403, 'Acesso não autorizado.');
        }
    }

    // Alterna o boolean
    public function toggleStatus()
    {
        $this->is_active = !$this->is_active;
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'is_active', 'userId', 'isEdit', 'showForm']);
        $this->is_active = true;
        $this->formKey++;
        $this->resetValidation();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;

        if ($this->showForm) {
            $this->isEdit = false;
            $this->userId = null;
            $this->password = null;
            $this->is_active = $this->is_active ?? true;
            $this->resetValidation();
        } else {
            $this->resetForm();
        }
    }

    public function store()
    {
        $this->ensureAuthenticated();

        $this->validate([
            'name' => 'required|string|min:3|max:120',
            'email' => 'required|email:rfc,dns|max:190|unique:users,email',
            'password' => 'required|string|min:6|max:255',
            'is_active' => 'required|boolean',
        ]);

        User::create([
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
            'password' => Hash::make($this->password),
            'is_active' => (bool) $this->is_active,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->ensureAuthenticated();

        $user = User::findOrFail($id);

        $this->formKey++;
        $this->resetValidation();

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;        
        // boolean no formulário
        $this->is_active = (bool) $user->is_active;
        $this->password = null;
        $this->isEdit = true;
        $this->showForm = true;
        
    }

    public function update()
    {
        $this->ensureAuthenticated();

        $user = User::findOrFail($this->userId);

        $this->validate([
            'name' => 'required|string|min:3|max:120',
            'email' => 'required|email:rfc,dns|max:190|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:6|max:255',
            'is_active' => 'required|boolean',
        ]);

        $data = [
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
            'is_active' => (bool) $this->is_active,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        $this->resetForm();
    }

    public function delete($id)
    {
        $this->ensureAuthenticated();
        User::destroy($id);
    }

    public function render()
    {
        $query = User::query()->latest();

        if ($this->filterStatus !== 'todos') {
            // '1' => ativo | '0' => inativo
            $query->where('is_active', (int) $this->filterStatus);
        }

        return view('livewire.users', [
            'users' => $query->get(),
        ]);
    }
}