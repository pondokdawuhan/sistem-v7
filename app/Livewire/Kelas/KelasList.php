<?php

namespace App\Livewire\Kelas;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;

class KelasList extends Component
{
    public $lembaga;
    public $search;
    public $nama;
    public $kelas_id;
    public $nama_edit;
    public $wali_kelas;
    public $selectedTingkat;
    public $selectedKelulusan;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;

    }

    public function render()
    {
      switch ($this->lembaga->jenis_lembaga) {
        case 'FORMAL':
          $tingkats = [1,2,3,4,5,6,7,8,9,10,11,12];
          break;
        
        case 'MADIN':
          $tingkats = ['ULA', 'WUSTHO', 'ULYA'];
          break;
        
        case 'MMQ':
          $tingkats = ['Jilid', 'Al-Quran'];
          break;
          
          default:
          $tingkats = ['Putra', 'Putri'];
          break;
      }
        if ($this->lembaga->jenis_lembaga == 'FORMAL') {
        } elseif($this->lembaga->jenis_lembaga == 'MADIN'){
        } 
        return view('livewire.kelas.kelas-list', [
          'kelas' => Kelas::where('lembaga_id', $this->lembaga->id)->where('nama', 'like', '%' . $this->search . '%')->orderBy('nama', 'asc')->get(),
          'users' => User::all(),
          'usersWali' => User::orderBy('name', 'asc')->get(),
          'santris' => Santri::all(),
          'tingkats' => $tingkats
        ])->title('Data Kelas ' . $this->lembaga->nama);
    }

    public function tambah()
    {
      
      $data = $this->validate([
        'nama' => 'required',
      ]);

      $data['lembaga_id'] = $this->lembaga->id;
      $data['tingkat'] = $this->selectedTingkat;
      $data['kelulusan'] = $this->selectedKelulusan;

      Kelas::create($data);

      session()->flash('success', 'Data berhasil ditambahkan');

      return $this->redirect('/kelas/' . $this->lembaga->id, navigate:true);
    }

    public function edit()
    {
      Kelas::find($this->kelas_id)->update([
        'nama' => $this->nama_edit,
        'tingkat' => $this->selectedTingkat,
        'kelulusan' => $this->selectedKelulusan
      ]);

      session()->flash('success', 'Data berhasil diubah');

      return $this->redirect('/kelas/' . $this->lembaga->id, navigate:true);
    }

    
    public function delete($id)
    {
      
      Kelas::find($id)->delete();
      session()->flash('success', 'Data Kelas berhasil dihapus!');
      return $this->redirect('/kelas/' . $this->lembaga->id, navigate:true);
    }

    public function editWaliKelas()
    { 
      Kelas::find($this->kelas_id)->update(['user_id' => $this->wali_kelas]);

      session()->flash('success', 'Data Wali Kelas berhasil diupdate!');
      return $this->redirect('/kelas/' . $this->lembaga->id, navigate:true);
    }
}
