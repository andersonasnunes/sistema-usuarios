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
    public $status = 'ativo';

    public $userId;
    public $isEdit = false;
    public $showForm = false;

    // Filtro: 'todos' | 'ativo' | 'inativo'
    public $filterStatus = 'todos';

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

    public function toggleStatus()
    {
        $this->status = $this->status === 'ativo' ? 'inativo' : 'ativo';
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'status', 'userId', 'isEdit', 'showForm']);
        $this->status = 'ativo';
        $this->resetValidation();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;

        if ($this->showForm) {
            // Abrindo como "novo usuário"
            $this->isEdit = false;
            $this->userId = null;
            $this->password = null;
            $this->status = $this->status ?: 'ativo';
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
            'status' => 'required|in:ativo,inativo',
        ]);

        User::create([
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->ensureAuthenticated();

        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;

        // ✅ importante: não preencher password ao editar
        $this->password = null;

        $this->isEdit = true;
        $this->showForm = true;
        $this->resetValidation();
    }

    public function update()
    {
        $this->ensureAuthenticated();

        $user = User::findOrFail($this->userId);

        $this->validate([
            'name' => 'required|string|min:3|max:120',
            'email' => 'required|email:rfc,dns|max:190|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:6|max:255',
            'status' => 'required|in:ativo,inativo',
        ]);

        $data = [
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
            'status' => $this->status,
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
            $query->where('status', $this->filterStatus);
        }

        return view('livewire.users', [
            'users' => $query->get(),
        ]);
    }
}
